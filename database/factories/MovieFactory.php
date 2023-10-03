<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
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
            'category_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->unique()->word(),
            'slug' => \Illuminate\Support\Str::slug($this->faker->unique()->word()),
            'description' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
