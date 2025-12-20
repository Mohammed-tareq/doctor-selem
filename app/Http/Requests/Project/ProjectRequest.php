<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        if ($this->isMethod('POST')) {
            return $this->storeRules();
        }
        return $this->updateRules();
    }

    private function storeRules()
    {
        return [
            'title' => 'required|string|min:3|max:200',
            'image_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    }


    private function updateRules()
    {
        return [
            'title' => 'sometimes|string|min:3|max:255',
            'image_cover' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}
