<?php

namespace Database\Seeders;

use App\Models\Audio;
use App\Models\CategoryAudio;
use Illuminate\Database\Seeder;

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = CategoryAudio::all();
        
        foreach ($categories as $category) {
            Audio::factory()->count(3)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}

