<?php

namespace Database\Seeders;

use App\Models\Subscribe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++){
            Subscribe::create([
                'email' => 'user'.$i.'@example.com'
            ]);
        }
    }
}
