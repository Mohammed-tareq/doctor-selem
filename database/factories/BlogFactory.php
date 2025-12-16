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
        return [
            'title' => fake()->sentence(),
            'content' => [
                'introduction' => fake()->paragraph(),
                'body' => fake()->paragraphs(3, true),
                'conclusion' => fake()->paragraph(),
            ],
            'image_cover' => fake()->imageUrl(),
            'type' => fake()->randomElement(['news', 'tutorial', 'opinion', 'update']),
            'date' => fake()->date(),
            'publisher' => User::factory(),
        ];
    }
}

