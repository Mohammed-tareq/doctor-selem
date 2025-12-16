<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'lang' => fake()->randomElement(['en', 'ar', 'fr', 'es']),
            'summary' => fake()->paragraphs(2, true),
            'images' => [
                fake()->imageUrl(),
                fake()->imageUrl(),
            ],
            'link' => fake()->url(),
            'publishing_house' => fake()->numberBetween(1, 10),
            'date' => fake()->dateTime(),
            'type' => fake()->randomElement(['textbook', 'reference', 'novel', 'guide']),
            'edition_number' => fake()->numberBetween(1, 5),
        ];
    }
}

