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
        $projects = \App\Models\Project::all();
        
        if ($projects->isEmpty()) {
            // Create projects if they don't exist
            $projects = \App\Models\Project::factory()->count(5)->create();
        }
        
        foreach ($projects as $project) {
            Audio::factory()->count(3)->create([
                'project_id' => $project->id,
            ]);
        }
    }
}


