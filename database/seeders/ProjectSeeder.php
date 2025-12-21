<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            // Create categories if they don't exist
            $categories = Category::factory()->count(40)->create();
        }


        Project::factory()->count(40)->create([
            'category_id' => $categories->random()->id,
        ]);
    }
}


