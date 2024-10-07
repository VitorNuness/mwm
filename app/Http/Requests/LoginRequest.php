<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
            ],
            'password' => 'required',
        ];
    }

    public function authenticate(): void
    {
        if (!Auth::attempt($this->only('email', 'password'))) {
            throw ValidationException::withMessages([
                "login" => "O e-mail ou senha informados estão incorretos.",
            ]);
        }
    }
}
