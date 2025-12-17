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
        // Arabic site names
        $arabicSiteNames = [
            'موقع الدكتور سليم',
            'المركز الطبي المتخصص',
            'عيادة الدكتور',
            'المركز الطبي الشامل',
        ];

        // Arabic footer
        $arabicFooter = 'جميع الحقوق محفوظة © ' . date('Y');

        return [
            'site_name' => fake()->randomElement($arabicSiteNames),
            'site_email' => fake()->companyEmail(),
            'site_phone' => '+966' . fake()->numerify('########'),
            'facebook' => 'https://facebook.com/' . fake()->userName(),
            'twitter' => 'https://twitter.com/' . fake()->userName(),
            'linkin' => 'https://linkedin.com/in/' . fake()->userName(),
            'instagram' => 'https://instagram.com/' . fake()->userName(),
            'footer' => $arabicFooter,
        ];
    }
}


