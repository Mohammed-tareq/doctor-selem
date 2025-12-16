<?php

namespace Database\Seeders;

use App\Models\Blocke;
use App\Models\Section;
use Illuminate\Database\Seeder;

class BlockeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = Section::all();
        
        foreach ($sections as $section) {
            Blocke::factory()->count(2)->create([
                'section_id' => $section->id,
            ]);
        }
    }
}

