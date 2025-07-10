<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RegController extends Controller
{

    public $customerId = null;

    /**
     * Display a listing of the resource.
     */
    public function index($lang, $id = null, $json = null, $manager = null, $avatar = null, $customer_id = null)
    {
        $id = request()->query('id');
        $customer_id = request()->query('customer_id');
        $json = Http::get("https://new.legaldesk.uz/csellers/" . $id)->json();
        if ($json != null) {
            # code...
            $manager = $json['name'];
            $avatar = '/img/avatar.jpg';
            $avatar = '/img/' . $json['avatar2'];
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
                'chat_id' => -1001285835091,
                'text' =>  'обращается к вам за помощью в регистрации заявки.',
            ]
        );
        $customer_service_id = request()->query('id');
        if ($request->lang == 'en') {
            $pdf = Pdf::loadView('reg.pdf.en', compact('request'));
        } elseif ($request->lang == 'uz') {
            $pdf = Pdf::loadView('reg.pdf.uz', compact('request'));
        } else {
            $pdf = Pdf::loadView('reg.pdf.ru', compact('request'));
        }
        $url = "ariza/" . Carbon::now()->format("Y_m_d_H_i_s") . ".pdf";
        Storage::put($url, $pdf->output());
        $data = Http::post("https://new.legaldesk.uz/save_data", [
            'customer_service_id' => $customer_service_id,
            'organisation_type' => $request->organisation_type,
            'company_name' => $request->company_name,
            'type_of_activity' => $request->type_of_activity,
            'juridical_name' => $request->juridical_name,
            'cadastral_number' => $request->cadastral_number,
            'tax_regime' => $request->tax_regime,
            'capital_summa' => $request->capital_summa,
            'customer_service_founder_id' => 10,
            'head_name' => $request->head_name,
            'head_phone' => $request->head_phone,
            'head_mail' => $request->head_mail,
            'organisation_phone' => $request->organisation_phone,
            'organisation_mail' => $request->organisation_mail,
            'note' => $request->note,
        ]);
        Log::info($data);
        return response()->json([
            'message' => 'Заявка успешно отправлена!',
            'pdf_url' => asset('storage/' . $url)
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function call($checkId, $customer_id)
    {
        // $this->customerId = $customer_id;
        $json = Http::get("https://new.legaldesk.uz/csellers/" . $checkId)->json();
        Http::post("https://new.legaldesk.uz/accept_task", [
            'customer_id' => $customer_id,
            'user_id' => $checkId,
        ]);
        $chat_id = $json['chat_id'] ?? null;
        $name = $json['name'] ?? 'Пользователь';
        Http::get(
            "https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendMessage",
            [
                'chat_id' => -1001285835091,
                'text' =>  '🔔 ' . $name . '! Ваш клиент под ID ' . $customer_id . ' обращается к вам за помощью в регистрации заявки.',
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
