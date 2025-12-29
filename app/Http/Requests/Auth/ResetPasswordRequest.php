<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetPasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'token' => 'required|numeric|digits_between:5,6',
            'email' => 'required|email|string',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'confirmed',
                "not_regex:/<[^>]*>/",
                "not_regex:/<\s*script/i",
                "not_regex:/javascript\s*:/i",
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],

            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'max:20',
                "not_regex:/<[^>]*>/",
                "not_regex:/<\s*script/i",
                "not_regex:/javascript\s*:/i",
            ],

        ];
    }

    public function messages()
    {
        return [
            'token.required' => 'The verification code is required.',
            'token.string' => 'The verification code must be a string.',
            'token.min' => 'The verification code must be at least 5 characters.',
            'token.max' => 'The verification code may not be greater than 6 characters.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.string' => 'The email address must be a string.',

            'password.required'   => 'The password is required.',
            'password.string'     => 'The password must be a string.',
            'password.min'        => 'The password must be at least 8 characters.',
            'password.max'        => 'The password may not be greater than 20 characters.',
            'password.confirmed'  => 'The password confirmation does not match.',

            'password.not_regex'  => 'The password must not contain HTML or script tags.',
            'password.letters'    => 'The password must contain at least one letter.',
            'password.mixed_case' => 'The password must contain at least one uppercase and one lowercase letter.',
            'password.numbers'    => 'The password must contain at least one number.',
            'password.symbols'    => 'The password must contain at least one special character.',


            'password_confirmation.required'  => 'The password confirmation is required.',
            'password_confirmation.string'    => 'The password confirmation must be a string.',
            'password_confirmation.min'       => 'The password confirmation must be at least 8 characters.',
            'password_confirmation.max'       => 'The password confirmation may not be greater than 20 characters.',
            'password_confirmation.not_regex' => 'The password confirmation must not contain HTML or script tags.',

        ];
    }
}
