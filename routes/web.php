<?php

use App\Http\Controllers\RegController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

//  Route::get('/pdf', 'PDFController@generatePDF');
Route::get('/{lang}', [RegController::class, 'index']);
Route::post('/store', [CompanyController::class, 'store']);
Route::get('/call/{checkId}/{customer_id}', [RegController::class, 'call']);

Route::get("/file", function (){
    return \Illuminate\Support\Facades\Storage::url(request()->input("file"));
 });
