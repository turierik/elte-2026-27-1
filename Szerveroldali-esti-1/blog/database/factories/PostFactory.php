<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            "content" => fake() -> paragraphs(3, true),
            "title" => fake() -> words(3, true),
            "image" => null,
            "user_id" => \App\Models\User::inRandomOrder() -> first()
        ];
    }
}
