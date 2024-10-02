<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthenticationController extends Controller
{
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
    }
}
