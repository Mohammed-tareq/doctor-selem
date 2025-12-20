<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'max:30'],
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'The email address is required.',
            'email.email'    => 'Please enter a valid email address.',
            'email.string'   => 'The email address must be a string.',

            'password.required'   => 'The password is required.',
            'password.string'     => 'The password must be a string.',
            'password.min'        => 'The password must be at least 6 characters.',
            'password.max'        => 'The password may not be greater than 20 characters.',

        ];
    }
}
