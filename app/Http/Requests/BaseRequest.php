<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mews\Purifier\Facades\Purifier;

abstract class BaseRequest extends FormRequest
{
    /**
     * تنضيف تلقائي آمن للحقول النصية فقط قبل التحقق
     */
    protected function prepareForValidation(): void
    {
        // لو الـ Request فيه ملفات (صور)، متلمسش حاجة خالص عشان متخربش
        if ($this->hasAnyFiles()) {
            return;
        }

        $input = $this->all();
        $cleaned = [];

        foreach ($input as $key => $value) {
            // لو القيمة array (زي checkboxes)، نضف كل عنصر فيها
            if (is_array($value)) {
                $cleaned[$key] = array_map([$this, 'cleanValue'], $value);
            }
            // لو string، نضفه بـ HTMLPurifier (أأمن حاجة في الدنيا)
            elseif (is_string($value)) {
                $cleaned[$key] = $this->cleanValue($value);
            }
            // لو رقم أو boolean أو null، سيبه زي ما هو
            else {
                $cleaned[$key] = $value;
            }
        }

        // استبدل البيانات القديمة بالمنضفة
        $this->replace($cleaned);
    }

    /**
     * دالة صغيرة تنضف النص الواحد
     */
    private function cleanValue($value)
    {
        // لو فاضي، رجعه فاضي
        if ($value === '' || $value === null) {
            return $value;
        }

        // استخدم HTMLPurifier عشان ينضف النص ويحمي من XSS
        return Purifier::clean($value);
    }

    /**
     * تحقق لو فيه أي ملفات في الـ Request
     */
    private function hasAnyFiles(): bool
    {
        return count($this->files->all()) > 0;
    }

    // باقي الدوال زي authorize لو عايز
    public function authorize(): bool
    {
        return true; // غيرها لو عايز تحكم في الصلاحيات
    }
}