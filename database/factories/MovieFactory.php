<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text('25'),
            'poster' => fake()->imageUrl(),
            'intro' => fake()->paragraph(1),
            'release_date'  => now(),
            'gene_id'   => rand(1, 4),
        ];
    }
}
