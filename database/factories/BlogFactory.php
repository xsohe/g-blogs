<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3, 5),
            'slug' => $this->faker->slug(mt_rand(2, 5)),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                    ->map(fn($p) => "<p>$p</p>")
                    ->implode(''),
            'tag_id' => mt_rand(1, 4),
            'user_id' => mt_rand(1, 4),
        ];
    }
}
