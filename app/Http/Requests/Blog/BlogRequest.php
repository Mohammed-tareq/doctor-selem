<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return $this->storeRules();
        }

        return $this->updateRules();
    }

    protected function storeRules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:200',
                'min:5',
                Rule::unique('blogs', 'title')->ignore($this->route('id')),
            ],
            'content' => 'required|string|min:20',
            'image_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_content' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            'date' => 'required|date_format:Y',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    protected function updateRules(): array
    {
        return [
            'title' => 'required|string|max:200|min:5',
            'content' => 'required|string|min:20',

            'image_cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_content' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            'date' => 'required|date_format:Y',
            'publisher' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }

}
