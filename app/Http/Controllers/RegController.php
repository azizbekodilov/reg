<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegController extends Controller
{

    public $customerId = null;

    /**
     * Display a listing of the resource.
     */
    public function index($lang, $id = null, $json = null, $manager = 1, $avatar = null, $customer_id = null)
    {
        $id = request()->query('id');
        $customer_id = request()->query('client_id');
        $json = Http::get("https://new.legaldesk.uz/csellers/" . $id)->json();
        if ($json != null) {
            $manager = $json['name'];
            $avatar = '/img/image.png';
            $avatar = '/img/' . $json['avatar2'];
        } else {
            $manager = 'Руслан Берекеев';
            $avatar = '/img/image.png';
            $id = 2;
            $customer_id = 274;
        }
        if ($lang == "en") {
            return view('reg.en', compact('id', 'customer_id', 'manager', 'avatar'));
        } else if ($lang == "uz") {
            return view('reg.uz', compact('id', 'customer_id', 'manager', 'avatar'));
        } else {
            return view('reg.ru', compact('id', 'customer_id', 'manager', 'avatar'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Логируем все входящие данные для отладки
            Log::info('Incoming request data:', $request->all());

            // Базовая валидация только обязательных полей (согласно серверной логике)
            $request->validate([
                'customer_service_id' => 'required|integer',
                'organisation_type' => 'required|integer',
                'company_name' => 'required|string',
                'type_of_activity' => 'required|string',
                'juridical_name' => 'required|string',
            ]);

            // Отправка уведомления в Telegram
            Http::get(
                "https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendMessage",
                [
                    'chat_id' => -1001877231624,
                    'text' => $request->customer_service_id,
                ]
            );

            // Объединяем основной и дополнительные виды деятельности
            $mainActivity = $request->input('type_of_activity', '');
            $additionalActivities = $request->input('additional_activities', []);
            $allActivities = array_filter(array_merge([$mainActivity], $additionalActivities));
            $combinedActivity = implode('; ', $allActivities);

            // Подготовка данных точно как ожидает серверная логика CustomerServicePdf::create()
            $postData = [
                'customer_service_id' => (int) $request->input('customer_service_id'),
                'organisation_type' => (int) $request->input('organisation_type'),
                'company_name' => $request->input('company_name'),
                'type_of_activity' => $combinedActivity,
                'juridical_name' => $request->input('juridical_name'),
                'cadastral_number' => $request->input('cadastral_number'),
                'tax_regime' => $request->input('tax_regime', 'general'),
                'capital_summa' => $request->input('capital_summa'),
                'head_name' => $request->input('head_name'),
                'head_phone' => $request->input('head_phone'),
                'head_mail' => $request->input('head_mail'),
                'organisation_phone' => $request->input('organisation_phone'),
                'organisation_mail' => $request->input('organisation_mail'),
                'note' => $request->input('note'),
            ];

            // Обрабатываем учредителей - серверная логика ожидает customer_service_founder
            $founders = $request->input('founders', []);
            if (!empty($founders) && is_array($founders)) {
                // Очищаем и проверяем данные учредителей
                $cleanFounders = [];
                foreach ($founders as $founder) {
                    if (isset($founder['type']) && !empty($founder['type'])) {
                        $cleanFounders[] = [
                            'type' => (int) $founder['type'], // founder_type
                            'country' => $founder['country'] ?? '', // founder_country
                            'name' => $founder['name'] ?? '', // founder_name (для ФИО физ.лица)
                            'names' => $founder['names'] ?? '', // founder_participation (для наименования юр.лица)
                            'phone' => $founder['phone'] ?? '', // founder_phone
                            'mail' => $founder['mail'] ?? '', // founder_mail
                            'contact_name' => $founder['contact_name'] ?? '', // founder_contact_name
                            'share' => (float) ($founder['share'] ?? 0), // founder_share
                        ];
                    }
                }
                if (!empty($cleanFounders)) {
                    $postData['customer_service_founder'] = $cleanFounders;
                }
            }

            // Добавляем дополнительные наименования с ограничением длины
            for ($i = 1; $i <= 5; $i++) {
                $fieldName = "additional_company_names{$i}";
                $value = $request->input($fieldName);
                if (!empty(trim($value ?? ''))) {
                    $postData[$fieldName] = substr(trim($value), 0, 255);
                } else {
                    $postData[$fieldName] = null; // nullable в БД
                }
            }

            // ECP поля не нужны в save_data API, они обрабатываются отдельно

            Log::info('Store request data:', $postData);

            // Отправка данных на внешний API
            $response = Http::timeout(30)->post("https://new.legaldesk.uz/save_data", $postData);

            Log::info('API response status:', $response->status());
            Log::info('API response body:', $response->body());

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Заявка успешно отправлена',
                    'data' => $response->json()
                ], 200);
            } else {
                Log::error('API request failed with status: ' . $response->status());
                Log::error('API error response: ' . $response->body());

                return response()->json([
                    'success' => false,
                    'message' => 'Ошибка сервера при обработке заявки',
                    'error' => 'HTTP ' . $response->status()
                ], 500);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка валидации данных',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Store error: ' . $e->getMessage());
            Log::error('Store error trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при сохранении заявки',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function call($checkId, $customer_id)
    {
        // $this->customerId = $customer_id;
        $json = Http::get("https://new.legaldesk.uz/csellers/" . $checkId)->json();
        $customerJson = Http::get("https://new.legaldesk.uz/customer_info/" . $customer_id)->json();
        Http::post("https://new.legaldesk.uz/accept_task", [
            'customer_id' => $customer_id,
            'user_id' => $checkId,
        ]);
        $chat_id = $json['chat_id'] ?? null;
        $name = $json['name'] ?? 'Пользователь';
        $customerName = $customerJson['name'] ?? ' клиент';
        Http::get(
            "https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendMessage",
            [
                'chat_id' => -1001239048053,
                'text' =>  '🔔 ' . $name . '! Ваш клиент '. $customerName .' под ID ' . $customer_id . ' обращается к вам за помощью в регистрации заявки.',
            ]
        );
        return response()->json(['message' => 'Скоро с вами свяжутся.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
