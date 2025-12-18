<?php

namespace Database\Factories;

use App\Models\Audio;
use Illuminate\Database\Eloquent\Factories\Factory;
use getID3;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audio>
 */
class AudioFactory extends Factory
{
    protected $model = Audio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic audio titles
        $arabicTitles = [
            'محاضرة عن الطب الحديث',
            'ندوة حول الصحة النفسية',
            'حلقة نقاش عن الأبحاث الطبية',
            'مقابلة مع خبير طبي',
            'شرح عن الأمراض المزمنة',
            'توعية صحية',
            'محاضرة تعليمية',
            'ندوة علمية',
        ];

        // Arabic content
        $arabicContent = [
            'محاضرة شاملة تغطي أهم المواضيع الطبية الحديثة',
            'ندوة تفاعلية مع الخبراء في المجال الطبي',
            'حلقة نقاش حول آخر التطورات في الطب',
            'مقابلة مع أحد أبرز الأطباء في المنطقة',
        ];

        // Arabic details
        $arabicDetails = [
            'تفاصيل شاملة عن الموضوع المطروح مع شرح مفصل لكل النقاط المهمة',
            'شرح تفصيلي مع أمثلة عملية من الواقع الطبي',
            'تحليل عميق للموضوع مع استعراض الخبرات العملية',
        ];

        // Arabic types
        $arabicTypes = [
            'محاضرة',
            'ندوة',
            'مقابلة',
            'حلقة نقاش',
            'توعية',
        ];

        $getID3 = new getID3();
        $info = $getID3->analyze(public_path('files/audio.mp3'));
        $duration = isset($info['playtime_seconds']) ? (int)$info['playtime_seconds'] : null;


        return [
            'title' => fake()->randomElement($arabicTitles),
            'content' => asset('files/audio.mp3'),
            'details' => fake()->randomElement($arabicDetails),
            'type' => fake()->randomElement($arabicTypes),
            'project_id' => \App\Models\Project::factory(),
            'duration' => $duration,
        ];
    }
}


