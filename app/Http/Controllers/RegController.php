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
        Http::get(
            "https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendMessage",
            [
                'chat_id' => -1001877231624,
                'text' => $request->customer_service_id,
            ]
        );
        $data = Http::post("https://new.legaldesk.uz/save_data", [
            'customer_service_id' => $request->customer_service_id,
            'organisation_type' => $request->organisation_type,
            'company_name' => $request->company_name,
            'type_of_activity' => $request->type_of_activity,
            'juridical_name' => $request->juridical_name,
            'cadastral_number' => $request->cadastral_number,
            'tax_regime' => $request->tax_regime,
            'capital_summa' => $request->capital_summa,
            'customer_service_founder' => $request->founders,
            'head_name' => $request->head_name,
            'head_phone' => $request->head_phone,
            'head_mail' => $request->head_mail,
            'organisation_phone' => $request->organisation_phone,
            'organisation_mail' => $request->organisation_mail,
            'note' => $request->note,
        ]);
        Log::info($data);
        return response()->json([
            'message' => $data
        ], 200);
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
