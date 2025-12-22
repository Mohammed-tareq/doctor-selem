<?php

namespace App\Http\Requests\Audio;

use App\Http\Requests\BaseRequest;
use getID3;

class AudioRequest extends BaseRequest
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
        $isStore = $this->isMethod('post');

        return [
            'title' => $isStore
                ? 'required|string|max:255|unique:audios,title'
                : 'sometimes|string|max:255|unique:audios,title,' . $this->route('id'),


            'details' => $isStore
                ? 'required|string'
                : 'sometimes|string',

            'project_id' => $isStore
                ? 'required|exists:projects,id'
                : 'sometimes|exists:projects,id',

            'content' => [
                $isStore ? 'required' : 'sometimes',
                'file',
                'mimes:mp3,wav,ogg',
                'max:10240', // 10 MB
                function ($attribute, $value, $fail) {
                    $getID3 = new getID3();
                    $fileInfo = $getID3->analyze($value->getPathname());

                    if (isset($fileInfo['playtime_seconds']) && $fileInfo['playtime_seconds'] > 900) {
                        $fail('مدة الملف الصوتي يجب أن لا تتجاوز 15 دقيقة.');
                    }
                },
            ],
        ];
    }
}
