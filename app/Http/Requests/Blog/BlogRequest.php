<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
{
    protected string $textRegex =
        "/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u";


    public function authorize(): bool
    {
        return true;
    }




    public function rules(): array
    {
        if ($this->isMethod("POST")) {
            return $this->storeRules();
        }

        if ($this->isMethod("PUT") || $this->isMethod("PATCH")) {
            return $this->updateRules();
        }

        return [];
    }

    protected function storeRules(): array
    {
        return [
            "title" => [
                "required",
                "string",
                "max:200",
                "min:5",
                "unique:blogs,title",
                "regex:{$this->textRegex}", // حروف عربي وانجليزي وأرقام بس
            ],
            "content" => "required|string|min:20|not_regex:/<[^>]*>/",
            "image_cover" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "image_content" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "date" => "required|integer|date_format:Y",
            "publisher" => "required|string|max:255|regex:{$this->textRegex}",
            "category_id" => "required|exists:categories,id",
        ];
    }

    protected function updateRules(): array
    {
        return [
            "title" => [
                "sometimes",
                "string",
                "max:200",
                "min:5",
                Rule::unique("blogs", "title")->ignore($this->route("id")),
                "regex:{$this->textRegex}",
            ],
            "content" => "sometimes|string|min:20|not_regex:/<[^>]*>/",
            "image_cover" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "image_content" => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "date" => "sometimes|integer|date_format:Y",
            "publisher" => "sometimes|string|max:255|regex:{$this->textRegex}",
            "category_id" => "sometimes|exists:categories,id",
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "العنوان مطلوب",
            "title.unique" => "هذا العنوان موجود بالفعل",
            "title.regex" => "العنوان يحتوي على أحرف غير مسموح بها",
            "content.required" => "المحتوى مطلوب",
            "category_id.required" => "القسم مطلوب",
            "category_id.exists" => "القسم غير موجود",
        ];
    }
}