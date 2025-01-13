<?php

use App\Http\Controllers\CalcController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calcs/{number1}/{calclation}/{number2}', [CalcController::class, 'result']);
