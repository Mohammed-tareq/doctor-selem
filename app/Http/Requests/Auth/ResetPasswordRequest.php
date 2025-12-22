<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'token' => 'required|string|min:5|max:6',
            'email' => 'required|email|string',
            'password' => 'required|string|min:6|max:20|confirmed',
            'password_confirmation' => 'required|string|min:6|max:20',
        ];
    }
    public function messages()
    {
        return [
            'token.required' => 'The verification code is required.',
            'token.string'   => 'The verification code must be a string.',
            'token.min'      => 'The verification code must be at least 5 characters.',
            'token.max'      => 'The verification code may not be greater than 6 characters.',

            'email.required' => 'The email address is required.',
            'email.email'    => 'Please enter a valid email address.',
            'email.string'   => 'The email address must be a string.',

            'password.required'   => 'The password is required.',
            'password.string'     => 'The password must be a string.',
            'password.min'        => 'The password must be at least 6 characters.',
            'password.max'        => 'The password may not be greater than 20 characters.',
            'password.confirmed'  => 'The password confirmation does not match.',

            'password_confirmation.required' => 'The password confirmation is required.',
            'password_confirmation.string'   => 'The password confirmation must be a string.',
            'password_confirmation.min'      => 'The password confirmation must be at least 6 characters.',
            'password_confirmation.max'      => 'The password confirmation may not be greater than 20 characters.',
        ];
    }
}
