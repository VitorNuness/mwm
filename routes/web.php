<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Route};

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', function (Request $request) {
    Auth::attempt($request->only([
        'email',
        'password',
    ]));
});
