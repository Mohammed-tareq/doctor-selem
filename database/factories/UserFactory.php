<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Arabic names
        $arabicNames = 'الدكتور سليم';


        $arabicFullNames = 'الدكتور سليم محمد أحمد';

        // Arabic bio examples
        $arabicBios = 'طبيب متخصص في الطب الباطني مع خبرة واسعة في التشخيص والعلاج
            أستاذ في كلية الطب مع اهتمام خاص بالبحوث الطبية
            جراح متخصص في جراحة القلب مع سنوات من الخبرة
            طبيب أطفال مع شغف بمساعدة الأطفال والعائلات
            باحث طبي متخصص في الأمراض المزمنة';


        return [
            'name' => $arabicNames,
            'full_name' => $arabicFullNames,
            'email' => 'doctor@example.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'bio' => $arabicBios,
            'personal_aspect' =>$arabicBios,
            'educational_aspect' => $arabicBios,
            'image_cover' =>asset('files/user.webp'),
            'images' => [
                asset('files/user.webp'),
                asset('files/user2.webp'),
            ],
            'phone' => '00966555555555',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
