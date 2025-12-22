<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
{
    protected string $textRegex =
        "/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u";

    public function authorize(): bool
    {
        return true;
    }


    public function rules()
    {
        if ($this->isMethod("POST")) {
            return $this->storeRules();
        }
        return $this->updateRules();
    }

    protected function storeRules(): array
    {
        return [
            "title" => "required|string|min:3|max:255|unique:Books,title|regex:{$this->textRegex}",
            "date" => "required|date|date_format:Y",
            "publishing_house" => "required|string|max:100|regex:{$this->textRegex}",
            "lang" => "required|string|max:40|regex:{$this->textRegex}",
            "pages" => "required|integer|min:1",
            "edition_number" => "required|string|min:5|regex:{$this->textRegex}",
            "goals" => "required|string|min:10|max:2000|regex:{$this->textRegex}",
            "summary" => "required|string",
            "category_id" => "required|exists:categories,id",

            "images" => "required|array|min:1",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "link" => "required|string|url"
        ];
    }

    protected function updateRules(): array
    {
        return [
            "title" => [
                "sometimes",
                "string",
                "min:3",
                "max:255",
                "regex:{$this->textRegex}",
                Rule::unique("books", "title")->ignore($this->route("id")),

            ],

            "date" => "sometimes|date|date_format:Y",
            "publishing_house" => "sometimes|string|max:100|regex:{$this->textRegex}",
            "lang" => "sometimes|string|max:40|regex:{$this->textRegex}",
            "pages" => "sometimes|integer|min:1|regex:{$this->textRegex}",
            "edition_number" => "sometimes|string|min:5|regex:{$this->textRegex}",
            "goals" => "sometimes|string|max:2000|regex:{$this->textRegex}",
            "summary" => "sometimes|string|max:2000|regex:{$this->textRegex}",
            "category_id" => "sometimes|exists:categories,id",

            "images" => "sometimes|array",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "link" => "sometimes|string|url"
        ];
    }
}
