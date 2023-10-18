<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'P00'.$this->faker->unique()->numberBetween(0, 100),
            'cat_code' => function () {
                return ProductCategory::inRandomOrder()->first()->code;
            },

            'name' => $this->faker->name,
            'qty' => $this->faker->randomNumber(),
            'price_purchase' => $this->faker->randomFloat(2, 10, 1000),
            'price_sale' => $this->faker->randomFloat(2, 10, 1000),
            'is_status' => $this->faker->boolean(),
            'descriptions' => $this->faker->paragraph,
            'sort_order' => $this->faker->numberBetween(1,10),
        ];
    }


}
