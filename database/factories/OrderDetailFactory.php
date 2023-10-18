<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_order' => function () {
                return Order::inRandomOrder()->first()->invoice_order;
            },
            'product_code' => function () {
                return Product::inRandomOrder()->first()->code;
            },
            'qty'=>$this->faker->randomDigit(10),
        ];
    }
}
