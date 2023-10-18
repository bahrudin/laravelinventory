<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idCard = fake()->unique()->dateTimeBetween('-30 days', '+30 days','Asia/Jakarta');
        return [
            'customer_card' => 'ME'.$idCard->format('Ymd').'000'.$this->faker->unique()->numberBetween(0, 100),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'is_status' => $this->faker->boolean,
        ];
    }
}
