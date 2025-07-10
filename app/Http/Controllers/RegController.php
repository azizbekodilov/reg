<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class RegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($lang, $id = null)
    {
        $json = Http::get("https://new.legaldesk.uz/csellers/".$id)->json();
        $manager = '';
        $manager = $json;
        $id = request()->query('id');
        if ($lang == "en"){
            return view('reg.en', compact('id', 'manager'));
        }else if ($lang == "uz"){
            return view('reg.uz', compact('id', 'manager'));
        }else{
            return view('reg.ru', compact('id', 'manager'));
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
        if ($request->lang == 'en'){
            $pdf = Pdf::loadView('reg.pdf.en', compact('request'));
        }elseif ($request->lang == 'uz'){
            $pdf = Pdf::loadView('reg.pdf.uz', compact('request'));
        }else{
            $pdf = Pdf::loadView('reg.pdf.ru', compact('request'));
        }
        $url = "ariza/".Carbon::now()->format("Y_m_d_H_i_s").".pdf";
        Storage::put($url, $pdf->output());
        sleep(1);
        if ($url) {
            $checkCustomerServiceId = $request->input("id");
            Http::post("https://new.legaldesk.uz/save_pdf", [
                'url' => 'link',
                'customer_service_id' => $checkCustomerServiceId,
            ]);
            Http::get("https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendDocument",
                [
                    'chat_id'=>'5295550547',
                    'document'=> 'https://reg.legalact.uz/storage/' . $url,
                ]
            );
        }
        return redirect()->back()->with('message', 'IT WORKS!');
    }

    /**
     * Display the specified resource.
     */
    public function call($checkId)
    {
        $json = Http::get("https://new.legaldesk.uz/csellers/".$checkId)->json();
        $chat_id = $json['chat_id'];
        $name = $json['name'];
        Http::get("https://api.telegram.org/bot6354015174:AAGLuJ6ALa51gikxxt28pZStHgzCJAB9v-4/sendMessage",
                [
                    'chat_id'=>$chat_id,
                    'text'=>  '🔔 '.$name.'! Ваш клиент Максим обращается к вам за помощью в регистрации заявки.',
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
