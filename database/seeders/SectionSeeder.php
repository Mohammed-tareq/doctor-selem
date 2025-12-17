<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        
        foreach ($articles as $article) {
            Section::factory()->count(3)->create([
                'article_id' => $article->id,
            ]);
        }
    }
}


