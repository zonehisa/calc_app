<?php

use App\Http\Controllers\CalcController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calcs', [CalcController::class, 'showForm']);
Route::post('/calcs', [CalcController::class, 'calculate']);
