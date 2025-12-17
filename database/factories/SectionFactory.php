<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic section titles
        $arabicTitles = [
            'المقدمة',
            'الخلفية النظرية',
            'المنهجية',
            'النتائج',
            'المناقشة',
            'الخلاصة',
            'المراجع',
            'الملاحق',
        ];

        // Arabic content
        $arabicContent = [
            [
                'title' => 'المقدمة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'الخلفية النظرية',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'المنهجية',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ]
            ,
            [
                'title' => 'النتائج',
                'type' => 'image',
                'content' => asset('files/book1.webp'),
            ]
            ,
            [
                'title' => 'المناقشة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ]
            ,
            [
                'title' => 'الخلاصة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ]
            ,
            [
                'title' => 'المراجع',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ]
            ,
            
        ];

        return [
            'title' => fake()->randomElement($arabicTitles),
            'order' => fake()->numberBetween(1, 10),
            'content' => fake()->randomElement($arabicContent),
            'article_id' => Article::factory(),
        ];
    }
}


