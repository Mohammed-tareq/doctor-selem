<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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

    private function storeRules()
    {
        return [
            "title" => "required|string|min:3|max:200|unique:projects,title|regex:{$this->textRegex}",
            "image_cover" => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "category_id" => "required|integer|exists:categories,id",
        ];
    }


    private function updateRules()
    {
        return [
            'title' => "sometimes|string|min:3|max:255|regex:{$this->textRegex}|unique:projects,title," . $this->route('id'),
            "image_cover" => "sometimes|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            "category_id" => "sometimes|integer|exists:categories,id",
        ];
    }
}
