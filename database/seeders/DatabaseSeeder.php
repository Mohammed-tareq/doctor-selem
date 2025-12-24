<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            AudioSeeder::class,
            ArticleSeeder::class,
            SectionSeeder::class,
            BlogSeeder::class,
            BookSeeder::class,
            BusinessSeeder::class,
            SettingSeeder::class,
            subscribeSeeder::class
        ]);
    }
}
