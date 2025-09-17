<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $title = $this->faker->sentence;
        return [
            "title"=> $title,
            "slug"=> Str::slug($title),
            "content"=> $this->faker->paragraph,
            'image'=> $this->faker->imageUrl,
            'category_id' => function () {
              // return factory(Category::class)->create()->id;
              return Category::inRandomOrder()->first()->id;
            },
            'user_id'=> function () {
              return User::inRandomOrder()->first()->id;
            },
            'published_at'=> $this->faker->optional()->dateTime(),
        ];
    }
}
