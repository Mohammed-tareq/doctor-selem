<?php

namespace App\Http\Requests\Setting;

use App\Http\Requests\BaseRequest;

class SettingSiteRequest extends BaseRequest
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
            'site_name' => 'sometimes|string|max:30',
            'site_email' => 'sometimes|email|max:30',
            'site_phone' => 'sometimes|string|max:20',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'favicon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'facebook' => 'sometimes|string|url',
            'twitter' => 'sometimes|string|url',
            'instagram' => 'sometimes|string|url',
            'linkedin' => 'sometimes|string|url',
            'footer' => 'sometimes|string|max:200',
        ];
    }
}
