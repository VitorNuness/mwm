<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function store(Request $request)
    {
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
    }
}
