<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\User;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
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

        Business::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
    }
}


