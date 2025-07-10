<?php

use App\Http\Controllers\RegController;
use Illuminate\Support\Facades\Route;

Route::get("/file", function (){
    return \Illuminate\Support\Facades\Storage::url(request()->input("file"));
 });
 Route::get('/pdf', 'PDFController@generatePDF');
 Route::get('/{lang}', [RegController::class, 'index']);
 Route::post('/form', 'RegController@store');

 Route::get('/', function () {
     return redirect('/uz');
 });
