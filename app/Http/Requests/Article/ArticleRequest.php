<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    protected string $textRegex =
        "/^[a-zA-Z0-9\s\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF},.!?؛،\-_()]+$/u";

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:200',
                'min:5',
                Rule::unique('articles', 'title'),
                "regex:{$this->textRegex}",
            ],
            'type' => ['required', 'string', 'max:100', 'min:2',"regex:{$this->textRegex}"],
            'year' => ['required', 'date_format:Y', 'before_or_equal:' . now()->year],
            'category_id' => ['required', 'integer','exists:categories,id'],
            'writer' => ['required', 'string', 'max:100', 'min:5',"regex:{$this->textRegex}"],
            'post_by' => ['required', 'string', 'max:100', 'min:5',"regex:{$this->textRegex}"],
            'references' => ['sometimes', 'array'],

            'sections' => ['required', 'array'],

            'sections.*.title' => ['required', 'string', 'max:200', 'min:3',"regex:{$this->textRegex}"],
            'sections.*.order' => ['required', 'integer', 'min:1'],

            'sections.*.content' => ['required', 'array'],
            'sections.*.content.*.type' => ['required', 'string', 'in:text,image,video,link'],
            'sections.*.content.*.content' => [
                'required',
                function ($attribute, $value, $fail) {
                    $parts = explode('.', $attribute);
                    $contentIndex = $parts[count($parts) - 2];
                    $sectionIndex = $parts[1];
                    $type = $this->input("sections.{$sectionIndex}.content.{$contentIndex}.type");

                    if ($type === 'text' && !is_string($value)) {
                        $fail('المحتوى النصي يجب أن يكون نصًا.');
                    }

                    if ($type === 'image' && !is_string($value)) {
                        $fail('اسم ملف الصورة يجب أن يكون نصًا (مثل new_intro.png).');
                    }

                    if ($type === 'video' && !is_string($value)) {
                        $fail('اسم ملف الفيديو يجب أن يكون نصًا (مثل video.mp4).');
                    }

                    if ($type === 'link' && !filter_var($value, FILTER_VALIDATE_URL)) {
                        $fail('الرابط غير صالح، يجب أن يكون رابط كامل مثل https://example.com');
                    }
                },
            ],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['title'][0] = 'sometimes';
            $rules['title'][4] = Rule::unique('articles', 'title')->ignore($this->route('id'));
            $rules['type'][0] = 'sometimes';
            $rules['year'][0] = 'sometimes';
            $rules['category_id'][0] = 'sometimes';
            $rules['writer'][0] = 'sometimes';
            $rules['post_by'][0] = 'sometimes';
            $rules['sections'][0] = 'sometimes';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'title.min' => 'العنوان يجب أن يكون على الأقل 5 أحرف',
            'title.max' => 'العنوان يجب ألا يزيد عن 200 حرف',

            'type.required' => 'النوع مطلوب',
            'type.min' => 'النوع يجب أن يكون أطول من 2 أحرف',
            'type.max' => 'النوع يجب ألا يزيد عن 100 حرف',

            'year.required' => 'السنة مطلوبة',
            'year.integer' => 'السنة يجب أن تكون رقم صحيح',
            'year.max' => 'السنة يجب ألا تتجاوز السنة الحالية',

            'category_id.required' => 'الفئة مطلوبة',
            'category_id.exists' => 'الفئة المختارة غير موجودة',

            'writer.required' => 'اسم الكاتب مطلوب',
            'writer.min' => 'اسم الكاتب يجب أن يكون أطول من 5 أحرف',
            'writer.max' => 'اسم الكاتب يجب ألا يزيد عن 100 حرف',

            'post_by.required' => 'اسم الناشر مطلوب',
            'post_by.min' => 'اسم الناشر يجب أن يكون أطول من 5 أحرف',
            'post_by.max' => 'اسم الناشر يجب ألا يزيد عن 100 حرف',

            'sections.required' => 'الأقسام مطلوبة',
            'sections.array' => 'الأقسام يجب أن تكون مصفوفة',

            'sections.*.title.required' => 'عنوان القسم مطلوب',
            'sections.*.title.min' => 'عنوان القسم يجب أن يكون على الأقل 3 أحرف',
            'sections.*.title.max' => 'عنوان القسم يجب ألا يزيد عن 200 حرف',

            'sections.*.order.required' => 'ترتيب القسم مطلوب',
            'sections.*.order.integer' => 'ترتيب القسم يجب أن يكون رقم صحيح',

            'sections.*.content.required' => 'محتوى القسم مطلوب',
            'sections.*.content.array' => 'محتوى القسم يجب أن يكون مصفوفة',

            'sections.*.content.*.type.required' => 'نوع المحتوى مطلوب',
            'sections.*.content.*.type.in' => 'نوع المحتوى يجب أن يكون text أو image أو video أو link',

            'sections.*.content.*.content.required' => 'محتوى العنصر مطلوب',
        ];
    }
}
