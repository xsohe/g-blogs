<?php

namespace Database\Factories;

use App\Models\Projects;
use App\Models\Stack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 3)),
            'user_id' => mt_rand(1,4),
            'stack_id' => mt_rand(1,4),
            'slug' => $this->faker->slug(mt_rand(2, 5)),
            'desc' =>  $this->faker->sentence(mt_rand(3, 6)),
            'source' =>  $this->faker->url(),
        ];
    }
}
