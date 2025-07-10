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
    public function index($lang)
    {
        if ($lang == "en"){
            return view('reg.en');
        }else if ($lang == "ru"){
            return view('reg.ru');
        }else{
            return view('reg.uz');
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
        }elseif ($request->lang == 'ru'){
            $pdf = Pdf::loadView('reg.pdf.ru', compact('request'));
        }else{
            $pdf = Pdf::loadView('reg.pdf.uz', compact('request'));
        }
        $url = "ariza/".Carbon::now()->format("Y_m_d_H_i_s").".pdf";
        Storage::put($url, $pdf->output());
        sleep(1);
        if ($url) {
            $checkCustomerServiceId = $request->input("id");
            Http::post("https://new.legaldesk.uz/customers/save_pdf_application", [
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
    public function show(string $id)
    {
        //
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
