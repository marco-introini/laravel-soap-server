<?php

use App\Http\Controllers\SoapDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/soap/server', [SoapDemoController::class,'wsdlAction'])->name('soap-wsdl');
Route::post('/soap/server', [SoapDemoController::class,'serverAction'])->name('soap-server');
