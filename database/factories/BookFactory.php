<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic book titles
        $arabicTitles = [
            'أساسيات الطب الباطني',
            'دليل شامل للجراحة',
            'الطب النفسي الحديث',
            'أمراض القلب والشرايين',
            'طب الأطفال الشامل',
            'الطب الوقائي',
            'الأدوية والعلاجات',
            'التشخيص الطبي',
        ];

        // Arabic summary
        $arabicSummary = 'ملخص شامل للكتاب يغطي أهم المواضيع والمحاور الرئيسية مع شرح مفصل لكل فصل من فصول الكتاب';

        // Arabic types
        $arabicTypes = [
            'كتاب دراسي',
            'مرجع',
            'دليل',
            'كتاب تعليمي',
            'كتاب مرجعي',
        ];

        return [
            'title' => fake()->randomElement($arabicTitles),
            'lang' => fake()->randomElement(['ar', 'en', 'fr']),
            'summary' => $arabicSummary,
            'images' => [
               asset('files/book1.webp'),
                asset('files/book2.webp'),          ],
            'link' => fake()->url(),
            'publishing_house' => fake()->company(),
            'date' => fake()->dateTime(),
            'type' => fake()->randomElement($arabicTypes),
            'edition_number' => fake()->numberBetween(1, 5),
            'pages' => fake()->numberBetween(100, 1000),
            'goals' => 'أهداف الكتاب تشمل توفير معلومات شاملة ومفيدة للقارئ',
            'category_id' => \App\Models\Category::factory(),
            'num_view' => fake()->numberBetween(0, 10000),
        ];
    }
}


