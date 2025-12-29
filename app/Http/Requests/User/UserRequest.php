<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'sometimes|string|min:3|max:100',
            'full_name' => 'sometimes|string|min:3|max:100',
            'email' => 'sometimes|email',
            'password' => 'sometimes|string|min:6|confirmed',
            'password_confirmation' => 'required_with:password|same:password',
            'bio' => 'sometimes|string|max:300',
            'cv' => 'sometimes|file|mimes:pdf|max:4000',
            'personal_aspect' => 'sometimes|string|max:1000',
            'educational_aspect'=> 'sometimes|string|max:1000',
            'image_cover'=> 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'images'=> 'sometimes|array',
            'images.*'=> 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'phone'=> 'sometimes|string|max:15',
        ];
    }
}
