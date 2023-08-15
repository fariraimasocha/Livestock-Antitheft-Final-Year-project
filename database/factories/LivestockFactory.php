<?php

namespace Database\Factories;

use App\Models\Livestock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Livestock>
 */
class LivestockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'tag_no'=> fake()->unique()->buildingNumber(),
            'gender'=> fake()->randomElement(['male', 'female']),
            'dob'=>fake()->unique()->date(),
            'color'=> fake()->colorName(),
        ];
    }
}
