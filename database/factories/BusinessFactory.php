<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic content
        $arabicContent = [
           [
               'type' => 'work',
               'content' => 'عمل في مجله مصر '
           ],
           [
               'type' => 'award',
               'content' => 'حصلت على بكالوريوس الطب من جامعه القاهره'
           ],
            [
                'type' => 'award',
                'content' => 'حصل علي جوائز'
            ],
           [
               'type' => 'work',
               'content' => 'عمل في مجله مصر '
           ],
           [
               'type' => 'award',
               'content' => 'حصلت على بكالوريوس الطب من جامعه القاهره'
           ],
            [
                'type' => 'award',
                'content' => 'حصل علي جوائز'
            ],
           [
               'type' => 'work',
               'content' => 'عمل في مجله مصر '
           ],
           [
               'type' => 'award',
               'content' => 'حصلت على بكالوريوس الطب من جامعه القاهره'
           ],
            [
                'type' => 'award',
                'content' => 'حصل علي جوائز'
            ],
           [
               'type' => 'work',
               'content' => 'عمل في مجله مصر '
           ],
           [
               'type' => 'award',
               'content' => 'حصلت على بكالوريوس الطب من جامعه القاهره'
           ],
            [
                'type' => 'award',
                'content' => 'حصل علي جوائز'
            ],
        ];

        $user = User::first() ?? User::factory()->create([
            'name' => 'الدكتور سليم',
            'full_name' => 'الدكتور سليم محمد أحمد',
            'email' => 'doctor@example.com',
        ]);

        return [
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'content' => $arabicContent,
            'user_id' => $user->id,
        ];
    }
}


