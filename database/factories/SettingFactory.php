<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'site_name' => fake()->company(),
            'site_email' => fake()->companyEmail(),
            'site_phone' => fake()->phoneNumber(),
            'facebook' => 'https://facebook.com/' . fake()->userName(),
            'twitter' => 'https://twitter.com/' . fake()->userName(),
            'linkin' => 'https://linkedin.com/in/' . fake()->userName(),
            'instagram' => 'https://instagram.com/' . fake()->userName(),
            'footer' => fake()->sentence(),
        ];
    }
}

