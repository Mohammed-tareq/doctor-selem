<?php

namespace App\Http\Requests\Article;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => [
                'required',
                'string',
                'max:200',
                'min:5',
                Rule::unique('articles', 'title'),
            ],
            'type' => ['required', 'string', 'max:100', 'min:2'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'category_id' => ['required', 'exists:categories,id'],
            'writer' => ['required', 'string', 'max:100', 'min:5'],
            'post_by' => ['required', 'string', 'max:100', 'min:5'],
            'references' => ['sometimes', 'array'],

            'sections' => ['required', 'array'],

            'sections.*.title' => ['required', 'string', 'max:200', 'min:3'],
            'sections.*.order' => ['required', 'integer', 'min:1'],
//            'sections.*.article_id' => ['required', 'exists:articles,id'],

            // content array
            'sections.*.content' => ['required', 'array'],
            'sections.*.content.*.type' => ['required', 'string', 'in:text,image,video'],
            'sections.*.content.*.content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_contains($attribute, 'text') && !is_string($value)) {
                        $fail('النص داخل المحتوى يجب أن يكون نص صحيح.');
                    }

                    if (str_contains($attribute, 'image')) {
                        $validator = \Validator::make(
                            [$attribute => $value],
                            [$attribute => 'image|mimes:jpg,jpeg,png,webp|max:2048'] // 2MB
                        );
                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }

                    if (str_contains($attribute, 'video')) {
                        $validator = \Validator::make(
                            [$attribute => $value],
                            [$attribute => 'file|mimetypes:video/mp4,video/avi,video/mpeg|max:10240'] // 10MB
                        );
                        if ($validator->fails()) {
                            $fail($validator->errors()->first($attribute));
                        }
                    }
                }
            ],
        ];
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['title'][0] = 'sometimes';
            $rules['type'][0] = 'sometimes';
            $rules['year'][0] = 'sometimes';
            $rules['category_id'][0] = 'sometimes';
            $rules['writer'][0] = 'sometimes';
            $rules['post_by'][0] = 'sometimes';
            $rules['sections'][0] = 'sometimes';
        }

        return $rules;

    }



    public function messages()
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
            'year.min' => 'السنة يجب أن تكون أكبر من 1900',
            'year.max' => 'السنة يجب ألا تتجاوز السنة الحالية',

            'category_id.required' => 'الفئة مطلوبة',
            'category_id.exists' => 'الفئة المختارة غير موجودة',

            'writer.required' => 'اسم الكاتب مطلوب',
            'writer.min' => 'اسم الكاتب يجب أن يكون أطول من 5 أحرف',
            'writer.max' => 'اسم الكاتب يجب ألا يزيد عن 100 حرف',

            'post_by.required' => 'اسم الناشر مطلوب',
            'post_by.min' => 'اسم الناشر يجب أن يكون أطول من 5 أحرف',
            'post_by.max' => 'اسم الناشر يجب ألا يزيد عن 100 حرف',

            'sections.array' => 'الأقسام يجب أن تكون في شكل مصفوفة',

            'sections.*.title.required' => 'عنوان القسم مطلوب',
            'sections.*.title.min' => 'عنوان القسم يجب أن يكون أطول من 5 أحرف',
            'sections.*.title.max' => 'عنوان القسم يجب ألا يزيد عن 100 حرف',

            'sections.*.content.required' => 'محتوى القسم مطلوب',
            'sections.*.content.min' => 'محتوى القسم يجب أن يكون أطول من 5 أحرف',
            'sections.*.content.max' => 'محتوى القسم يجب ألا يزيد عن 16000 حرف',

            'sections.*.image.image' => 'الملف المرفوع يجب أن يكون صورة',
            'sections.*.image.mimes' => 'الصورة يجب أن تكون بصيغ jpg أو jpeg أو png أو webp',
            'sections.*.image.max' => 'حجم الصورة يجب ألا يتجاوز 2 ميجا',

            'sections.*.video.file' => 'الملف المرفوع يجب أن يكون فيديو',
            'sections.*.video.mimetypes' => 'الفيديو يجب أن يكون بصيغة mp4 أو avi أو mpeg',
            'sections.*.video.max' => 'حجم الفيديو يجب ألا يتجاوز 10 ميجا',
        ];
    }

}
