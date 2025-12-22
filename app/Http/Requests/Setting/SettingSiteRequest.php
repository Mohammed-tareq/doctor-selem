<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingSiteRequest extends FormRequest
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
            'site_name' => 'sometimes|string|max:30|not_regex:/<[^>]*>/',
            'site_email' => 'sometimes|email|max:30|not_regex:/<[^>]*>/',
            'site_phone' => 'sometimes|string|max:20|not_regex:/<[^>]*>/',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'favicon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'facebook' => 'sometimes|string|url|not_regex:/<[^>]*>/',
            'twitter' => 'sometimes|string|url|not_regex:/<[^>]*>/',
            'instagram' => 'sometimes|string|url|not_regex:/<[^>]*>/',
            'linkedin' => 'sometimes|string|url|not_regex:/<[^>]*>/',
            'footer' => 'sometimes|string|max:200|not_regex:/<[^>]*>/',
        ];
    }
}
