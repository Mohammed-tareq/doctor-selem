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
            'name' => 'Dr. Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'bio' => 'Experienced medical professional with years of expertise.',
            'specialization' => 'Cardiology',
            'education' => 'MD, PhD in Medicine',
            'nationality' => 'Egyptian',
            'experience' => '15 years of clinical practice',
            'personal_aspect' => 'Dedicated to patient care and medical research.',
            'educational_aspect' => 'Published multiple research papers in medical journals.',
            'image_cover' => 'https://via.placeholder.com/1200x400',
            'images' => [
                'https://via.placeholder.com/400x400',
                'https://via.placeholder.com/400x400',
            ],
            'phone' => '+201234567890',
        ]);
    }
}

