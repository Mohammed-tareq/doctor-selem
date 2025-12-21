<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    /**
     * تنضيف تلقائي لكل الـ inputs قبل الـ validation
     */
    protected function prepareForValidation(): void
    {
        $cleanedData = [];

        foreach ($this->all() as $key => $value) {
            $cleanedData[$key] = $this->deepClean($value);
        }

        $this->merge($cleanedData);
    }

    /**
     * تنضيف عميق للـ data (يشتغل على arrays و strings)
     */
    private function deepClean($value)
    {
        // لو array، نضّف كل عنصر فيه
        if (is_array($value)) {
            return array_map(fn($item) => $this->deepClean($item), $value);
        }

        // لو مش string، سيبه زي ما هو
        if (!is_string($value)) {
            return $value;
        }

        return $this->sanitizeString($value);
    }

    /**
     * تنضيف النصوص من SQL Injection و XSS
     */
    private function sanitizeString(string $input): string
    {
        if (empty($input)) {
            return $input;
        }

        // 1. منع SQL Injection Patterns
        $sqlPatterns = [
            // SQL Commands مع أقواس
            '/\b(ALTER|DROP|DELETE|INSERT|UPDATE|TRUNCATE|EXEC|EXECUTE|UNION|SELECT|CREATE|REPLACE|RENAME|SHOW|DESCRIBE)\b\s*\(/i',

            // SQL Comments
            '/--[^\r\n]*/i',           // Single line comments
            '/#[^\r\n]*/i',            // MySQL comments
            '/\/\*[\s\S]*?\*\//i',     // Multi-line comments

            // Union-based injection
            '/\bUNION\b[\s\S]*?\bSELECT\b/i',

            // Stacked queries
            '/;\s*(SELECT|INSERT|UPDATE|DELETE|DROP|CREATE|ALTER)/i',

            // Hex encoding attempts
            '/0x[0-9A-F]+/i',

            // SQL functions الخطيرة
            '/\b(SLEEP|BENCHMARK|WAITFOR|DELAY|LOAD_FILE|INTO\s+OUTFILE|INTO\s+DUMPFILE)\b/i',

            // Character encoding attacks
            '/\b(CHAR|ASCII|ORD|HEX|UNHEX|CONCAT_WS)\b\s*\(/i',
        ];

        $cleaned = $input;

        foreach ($sqlPatterns as $pattern) {
            $cleaned = preg_replace($pattern, '', $cleaned);
        }

        // 2. منع XSS Attacks
        $xssPatterns = [
            '/<script\b[^>]*>(.*?)<\/script>/is',
            '/<iframe\b[^>]*>(.*?)<\/iframe>/is',
            '/on\w+\s*=\s*["\'].*?["\']/i',        // onclick, onload, etc.
            '/javascript:/i',
            '/vbscript:/i',
            '/<embed\b[^>]*>/i',
            '/<object\b[^>]*>/i',
        ];

        foreach ($xssPatterns as $pattern) {
            $cleaned = preg_replace($pattern, '', $cleaned);
        }

        // 3. نضّف HTML tags (اختياري - علق السطر ده لو عايز تسمح بـ HTML)
        $cleaned = strip_tags($cleaned);

        // 4. نضّف whitespace زيادة
        $cleaned = trim($cleaned);

        return $cleaned;
    }

    /**
     * Override ده لو عايز تعطل التنضيف في request معين
     */
    protected function skipSanitization(): bool
    {
        return false;
    }

    /**
     * لو عايز تستثني fields معينة من التنضيف
     */
    protected function fieldsToSkip(): array
    {
        return []; // مثال: ['raw_html_content', 'password']
    }
}