<?php

namespace Database\Factories;

use App\Models\Blocke;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blocke>
 */
class BlockeFactory extends Factory
{
    protected $model = Blocke::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['text', 'image', 'video', 'code', 'quote']),
            'content' => fake()->paragraphs(3, true),
            'section_id' => Section::factory(),
        ];
    }
}

