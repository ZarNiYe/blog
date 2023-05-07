<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            Article::factory()->count(100)->create();
            Category::factory()->count(20)->create();
            Comment::factory()->count(300)->create();

            User::factory()->create([
                "name" => "admin",
                "email" => "admin@gmail.com",
            ]);

            User::factory()->create([
                "name" => "Alice",
                "email" => "alice@gmail.com",
            ]);

            User::factory()->create([
                "name" => "Bob",
                "email" => "bob@gmail.com",
            ]);
    }
}
