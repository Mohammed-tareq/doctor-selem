<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:30', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]+$/'],

            'password' => [
                'required',
                'string',
                'min:8',
                'max:30',
                "not_regex:/<[^>]*>/",
                "not_regex:/<\s*script/i",
                "not_regex:/javascript\s*:/i"],
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.string' => 'The email address must be a string.',

            'password.required'   => 'The password is required.',
            'password.string'     => 'The password must be a string.',
            'password.min'        => 'The password must be at least 8 characters.',
            'password.max'        => 'The password may not be greater than 30 characters.',
            'password.not_regex'  => 'The password must not contain HTML or script tags.',
           

        ];
    }
}
