<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class AuthenticationController extends Controller
{
    public function store(LoginRequest $request): void
    {
        $request->authenticate();
        $request->session()->regenerate();
    }
}
