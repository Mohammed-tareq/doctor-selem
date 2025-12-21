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
        static $order = 1;

        $sections = [
            [
                'title' => 'المقدمة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'الخلفية النظرية',
                'type' => 'text',
                'content' => [
                    [
                        'type' => 'text',
                        'content' => 'تم اختاره في فصل الخريف'
                    ],[
                        'type' => 'image',
                        'content' => asset('files/book1.webp')
                    ],[
                        'type' => 'video',
                        'content' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
                    ]
                ],
            ],
            [
                'title' => 'المنهجية',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'النتائج',
                'type' => 'image',
                'content' => asset('files/book1.webp'),
            ],
            [
                'title' => 'المناقشة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'الخلاصة',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
            [
                'title' => 'المراجع',
                'type' => 'text',
                'content' => 'مقدمة شاملة عن الموضوع المطروح',
            ],
        ];

        $section = $sections[($order - 1) % count($sections)];

        return [
            'title' => $section['title'],
            'order' => $order++,
            'content' => $section,
            'article_id' => Article::factory(),
        ];
    }

}


