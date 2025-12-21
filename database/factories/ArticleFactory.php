<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic article titles
        $arabicTitles = [
            'مشروع تطوير النظام الصحي',
            'مشروع البحث العلمي في الطب',
            'مشروع التوعية الصحية',
            'مشروع تطوير البرمجيات الطبية',
            'مشروع الدراسات السريرية',
            'مشروع التطوير التكنولوجي',
            'مشروع التعليم الطبي',
            'مشروع الرعاية الصحية',
            'مشروع الأبحاث الطبية',
            'مشروع التحسين الصحي',
            'مشروع الوقاية من الأمراض المزمنة',
            'مشروع دعم الصحة النفسية',
            'مشروع تطوير خدمات الطوارئ',
            'مشروع تعزيز صحة الأم والطفل',
            'مشروع مكافحة التدخين والإدمان',
            'مشروع تطوير الأجهزة الطبية',
            'مشروع الذكاء الاصطناعي في التشخيص',
            'مشروع تحسين جودة الأدوية',
            'مشروع التغذية العلاجية',
            'مشروع تطوير وحدات العناية المركزة',
            'مشروع الصحة الرقمية',
            'مشروع السجلات الطبية الإلكترونية',
            'مشروع تطوير خدمات الإسعاف',
            'مشروع الوقاية من العدوى',
            'مشروع تطوير المختبرات الطبية',
            'مشروع التدريب الطبي المستمر',
            'مشروع تعزيز الصحة المدرسية',
            'مشروع تطوير خدمات كبار السن',
            'مشروع تحسين إدارة المستشفيات',
            'مشروع الطب عن بُعد',
            'مشروع تطوير زراعة الأعضاء',
            'مشروع أبحاث السرطان',
            'مشروع تطوير العلاج الطبيعي',
            'مشروع تعزيز الصحة المجتمعية',
            'مشروع تطوير خدمات غسيل الكلى',
            'مشروع أبحاث الأمراض المعدية',
            'مشروع تطوير وحدات القلب',
            'مشروع تعزيز الصحة البيئية',
            'مشروع تطوير خدمات الطوارئ النفسية',
            'مشروع أبحاث الجينات الطبية',
        ];

        // Arabic types
        $arabicTypes = [
            'بحث',
            'مراجعة',
            'دراسة حالة',
            'رأي',
            'تحليل',
        ];

        // Arabic names
        $arabicNames = "دكتور مصطفي ";

        return [
            'title' => $this->faker->unique()->randomElement($arabicTitles),
            'type' => fake()->randomElement($arabicTypes),
            'year' => fake()->date(),
            'writer' => $arabicNames,
            'post_by' => $arabicNames,
            'category_id' => \App\Models\Category::factory(),
            'num_view' => fake()->numberBetween(0, 10000),
        ];
    }
}


