<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomLetters = strtoupper(Str::random(3)); // Mendapatkan tiga huruf acak
        $randomDigits = $this->faker->randomNumber(3); // Mendapatkan tiga digit angka acak
        $uniqueColumn = $randomLetters . $randomDigits;

        return [
            'code' => $uniqueColumn,
            'name' => $this->faker->name,
            'is_status' => $this->faker->boolean(),
            'descriptions' => $this->faker->paragraph(),
            'sort_order' => $this->faker->numberBetween(1,10),
        ];
    }
}
