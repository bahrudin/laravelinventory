<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    protected $model = Supplier::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'SUP'.$this->faker->unique()->numberBetween(0, 100),
            'cat_code' => function () {
                return ProductCategory::inRandomOrder()->first()->code;
            },
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'is_status' => $this->faker->boolean,
        ];
    }
}
