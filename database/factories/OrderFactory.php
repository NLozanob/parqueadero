<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Custommer::factory(),
            'date' => $this-> faker-> dateTime(),
            'value' => $this-> faker-> randomFloat(),
            'status' => '1',
            'registered_by' => $this-> faker-> name(),
        ];
    }
}
