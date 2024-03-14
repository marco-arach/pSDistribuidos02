<?php

use App\Http\Controllers\SoapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/soap', [SoapController::class, 'handle']);
