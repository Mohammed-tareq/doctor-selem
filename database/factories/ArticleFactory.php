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
            'دراسة حول تأثير العلاج الجديد على مرضى السكري',
            'مراجعة شاملة لأحدث الأبحاث في طب القلب',
            'تحليل حالة نادرة في جراحة المخ والأعصاب',
            'رأي حول مستقبل الطب الشخصي',
            'بحث في فعالية الأدوية الجديدة',
            'دراسة عن الصحة النفسية في المجتمع',
            'تحليل الأوبئة الحديثة',
            'بحث في الطب الوقائي',
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
            'title' => fake()->randomElement($arabicTitles),
            'type' => fake()->randomElement($arabicTypes),
            'year' => fake()->date(),
            'writer' => $arabicNames,
            'post_by' => $arabicNames,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}


