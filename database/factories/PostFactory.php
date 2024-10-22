<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            "title" => fake()->sentence(6),
            "slug" => fake()->slug(6),
            'excerpt' => fake()->text(200),
            'content' => fake()->text(800),
            'featured_image' => '',
            'category_id' => fake()->numberBetween(1,5),
            'status' => fake()->boolean(),
            'user_id' => 1
        ];
    }
}
