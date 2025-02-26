<?php

namespace Database\Seeders;

use App\Models\Article;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 5; $i++) {
            Article::create([
                'title' => Str::random(10),
                'author' => Str::random(10),
                'preview_text' => Str::random(50),
                'detail_text' => Str::random(100),
            ]);
        }
    }
}
