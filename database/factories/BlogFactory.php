<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic blog titles
        $arabicTitles = [
            'أحدث التطورات في مجال الطب',
            'نصائح صحية مهمة للجميع',
            'مقال عن الصحة النفسية',
            'تحديثات حول الأبحاث الطبية',
            'رأي حول مستقبل الرعاية الصحية',
            'دليل شامل للصحة العامة',
            'أخبار طبية مهمة',
            'مقال تعليمي عن الطب',
        ];

        // Arabic content
        $arabicContent = [
            'introduction' => 'مقدمة شاملة عن الموضوع المطروح',
            'body' => 'محتوى تفصيلي يغطي جميع جوانب الموضوع مع شرح مفصل لكل النقاط المهمة',
            'conclusion' => 'خلاصة الموضوع مع التوصيات المهمة',
        ];

        // Arabic types
        $arabicTypes = [
            'أخبار',
            'تعليمي',
            'رأي',
            'تحديث',
            'مقال',
        ];

        $user = User::first() ?? User::factory()->create([
            'name' => 'الدكتور سليم',
            'full_name' => 'الدكتور سليم محمد أحمد',
            'email' => 'doctor@g.com',
        ]);

        return [
            'title' => fake()->randomElement($arabicTitles),
            'content' => $arabicContent,
            'image_cover' => asset('files/book1.webp'),
            'image_content' => asset('files/book2.webp'),
            'type' => fake()->randomElement($arabicTypes),
            'date' => fake()->date(),
            'publisher' => (string) $user->id,
            'num_view' => fake()->numberBetween(0, 10000),
        ];
    }
}


