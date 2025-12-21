<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class BookRequest extends BaseRequest
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

    protected function storeRules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255',
            'date' => 'required|date_format:Y',
            'publishing_house' => 'required|string|max:100',
            'lang' => 'required|string|max:40',
            'pages' => 'required|integer|min:1',
            'edition_number' => 'required|string|min:5',
            'goals' => 'required|string',
            'summary' => 'required|string',
            'category_id' => 'required|exists:categories,id',

            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'required|string|url'
        ];
    }

    protected function updateRules(): array
    {
        return [
            'title' => [
                'sometimes',
                'string',
                'min:3',
                'max:255',
                Rule::unique('books', 'title')->ignore($this->route('id')),
            ],

            'date' => 'sometimes|date_format:Y',
            'publishing_house' => 'sometimes|string|max:100',
            'lang' => 'sometimes|string|max:40',
            'pages' => 'sometimes|integer|min:1',
            'edition_number' => 'sometimes|string|min:5',
            'goals' => 'sometimes|string',
            'summary' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id',

            'images' => 'sometimes|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'sometimes|string|url'
        ];
    }
}
