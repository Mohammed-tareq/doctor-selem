<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic category names
        $arabicNames = [
            'البحث العلمي',
            'الطب السريري',
            'التعليم الطبي',
            'التوعية الصحية',
            'التكنولوجيا الطبية',
            'الرعاية الصحية',
            'الأبحاث الطبية',
            'التطوير الصحي',
            'الدراسات الطبية',
            'الخدمات الصحية',
        ];

        return [
            'title' => fake()->randomElement($arabicNames),
        ];
    }
}

