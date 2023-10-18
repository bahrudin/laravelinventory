<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'emp_card' => $this->faker->name,
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'birth_place' => $this->faker->name,
            'birth_day' => $this->faker->name,
            'gender' => $this->faker->name,
            'phone' => $this->faker->name,
            'address' => $this->faker->name,
            'is_status' => $this->faker->name,
        ];
    }
}
