<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create([
            'site_name' => 'Doctor Selem',
            'site_email' => 'info@doctorselem.com',
            'site_phone' => '+201234567890',
            'facebook' => 'https://facebook.com/doctorselem',
            'twitter' => 'https://twitter.com/doctorselem',
            'linkin' => 'https://linkedin.com/in/doctorselem',
            'instagram' => 'https://instagram.com/doctorselem',
            'footer' => '© 2024 Doctor Selem. All rights reserved.',
        ]);
    }
}



