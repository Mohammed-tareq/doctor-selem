<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
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
            $categories = Category::factory()->count(5)->create();
        }

        foreach ($categories as $category) {
            Project::factory()->count(3)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}

