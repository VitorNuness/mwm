<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\{Route};

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthenticationController::class, 'store']);
