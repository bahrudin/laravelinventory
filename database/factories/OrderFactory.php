<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $date = fake()->unique()->dateTimeBetween('-30 days', '+30 days','Asia/Jakarta');

        return [
            'invoice_order' => 'INV'.$date->format('Ymd').'000'.$this->faker->unique()->numberBetween(0, 100),

            'customer_card' => function () {
                return Customer::inRandomOrder()->first()->customer_card;
            },

            'emp_card' => function () {
                return Employee::inRandomOrder()->first()->emp_card;
            },

            'descriptions'=> $this->faker->paragraph,
            'order_date'=> $this->faker->date('Y-m-d','now'),
        ];
    }
}
