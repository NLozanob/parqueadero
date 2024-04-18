<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomNumber(2, 0, 1000),
            'expiry_date' => $this->faker->date(),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}