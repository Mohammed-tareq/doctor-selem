<?php

namespace Database\Seeders;

use App\Models\CategoryAudio;
use Illuminate\Database\Seeder;

class CategoryAudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryAudio::factory()->count(5)->create();
    }
}

