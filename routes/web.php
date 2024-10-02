<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Route};

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only([
        'email',
        'password',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return;
    }

    return back()->withErrors([
        'email' => 'O e-mail ou senha informados estão incorretos.',
    ])->onlyInput('email');
});
