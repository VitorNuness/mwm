<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\{Route};
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [AuthenticationController::class, 'store']);
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');
