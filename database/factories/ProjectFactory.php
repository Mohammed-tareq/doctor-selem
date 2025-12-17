<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic project titles
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
        ];

        return [
            'title' => fake()->randomElement($arabicTitles),
            'image_cover' => asset('files/book1.webp'),
            'category_id' => Category::factory(),
        ];
    }
}

