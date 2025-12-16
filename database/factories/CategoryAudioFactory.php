<?php

namespace Database\Factories;

use App\Models\CategoryAudio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryAudio>
 */
class CategoryAudioFactory extends Factory
{
    protected $model = CategoryAudio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
        ];
    }
}

