<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'الدكتور سليم',
            'full_name' => 'الدكتور سليم محمد أحمد',
            'email' => 'doctor@example.com',
            'password' => Hash::make('password'),
            'bio' => 'طبيب متخصص في الطب الباطني مع خبرة واسعة في التشخيص والعلاج. حاصل على درجة الدكتوراه في الطب من جامعة عريقة مع خبرة في التدريس والبحث العلمي.',
            'personal_aspect' => 'متفاني في رعاية المرضى والبحث الطبي. ملتزم بتقديم أفضل رعاية صحية ممكنة.',
            'educational_aspect' => 'نشر عدة أوراق بحثية في المجلات الطبية. أستاذ في كلية الطب مع اهتمام خاص بالبحوث الطبية.',
            'image_cover' => fake()->imageUrl(1200, 400, 'people', true, 'Doctor Cover'),
            'images' => [
                fake()->imageUrl(400, 400, 'people', true, 'Profile'),
                fake()->imageUrl(400, 400, 'people', true, 'Profile'),
            ],
            'phone' => '+966501234567',
        ]);
    }
}


