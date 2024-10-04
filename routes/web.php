<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\{Route};
use Inertia\Inertia;

Route::view('/', 'welcome');

Route::post('/login', [AuthenticationController::class, 'store']);
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');
});
