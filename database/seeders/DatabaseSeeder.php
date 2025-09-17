<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = [
          'Technolony',
          'Health',
          'Sports',
          'Science',
          'Entertainment',

        ];

        foreach ($categories as $category) {
          Category::create([

            'name'=> $category,
            'slug'=> Str::slug($category),
            ]);
        }

        $this->call([

          UsersSeeder::class,
          PostsSeeder::class,

        ]);

    }
}
