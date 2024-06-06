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
            'order_id' => Order::factory(),
            'prodcut_id' => Product::factory(),
            'quantity' => $this-> faker-> numberBetween(),
            'price' => $this-> faker-> numberBetween(),
            'subtotal' => $this-> faker-> randomFloat(),
            'route' => $this-> faker-> string(),
            'registered_by' => $this-> faker-> name(),
        ];
    }
}
