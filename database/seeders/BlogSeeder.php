<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        
        if (!$user) {
            $user = \App\Models\User::factory()->create([
                'name' => 'الدكتور سليم',
                'full_name' => 'الدكتور سليم محمد أحمد',
                'email' => 'doctor@example.com',
            ]);
        }
        
        Blog::factory()->count(5)->create([
            'publisher' => (string) $user->id,
        ]);
    }
}


