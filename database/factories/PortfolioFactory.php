<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => fake()->sentence(3),
            'category' => fake()->randomElement(['Design', 'Video', 'Photography']),
            'description' => fake()->paragraph(),
            'image_url' => fake()->imageUrl(),
            'project_url' => fake()->url(),
        ];
    }
}
