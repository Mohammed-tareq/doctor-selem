<?php

namespace App\Http\Requests\Audio;

use getID3;
use Illuminate\Foundation\Http\FormRequest;

class AudioRequest extends FormRequest
{
    protected string $textRegex =
        "/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u";

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isStore = $this->isMethod("post");

        return [
            "title" => $isStore
                ? "required|string|max:255|unique:audios,title|regex:{$this->textRegex}"
                : "sometimes|string|max:255|regex:{$this->textRegex}|unique:audios,title," . $this->route('id'),


            "details" => $isStore
                ? "required|string|max:1000|regex:{$this->textRegex}"
                : "sometimes|string|max:1000|regex:{$this->textRegex}",

            "project_id" => $isStore
                ? "required|integer|exists:projects,id"
                : "sometimes|integer|exists:projects,id",

            "content" => [
                $isStore ? "required" : "sometimes",
                "file",
                "mimes:mp3,wav,ogg",
                "max:10240", // 10 MB
                function ($attribute, $value, $fail) {
                    $getID3 = new getID3();
                    $fileInfo = $getID3->analyze($value->getPathname());

                    if (isset($fileInfo["playtime_seconds"]) && $fileInfo["playtime_seconds"] > 900) {
                        $fail("مدة الملف الصوتي يجب أن لا تتجاوز 15 دقيقة.");
                    }
                },
            ],
        ];
    }
}
