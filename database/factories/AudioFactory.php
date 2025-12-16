<?php

namespace Database\Factories;

use App\Models\Audio;
use App\Models\CategoryAudio;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'details' => fake()->paragraphs(2, true),
            'category_id' => CategoryAudio::factory(),
        ];
    }
}

