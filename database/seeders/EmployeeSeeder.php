<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        foreach(range(1, 10) as $index) {
            $firstName = $faker->firstName;
            $middleName = '';
            $lastName = $faker->lastName;

            $idCard = fake()->unique()->dateTimeBetween('-30 days', '+30 days','Asia/Jakarta');

            Employee::create([
                'emp_card'     => $idCard->format('Ymd').'000'.$faker->unique()->numberBetween($min = 1, $max = 50).$index,
                'first_name'     => $firstName,
                'middle_name'     => $middleName,
                'last_name'     => $lastName,
                'birth_place'     => $faker->country(),
                'birth_day'     => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gender'     => $faker->randomElement(['male', 'female']),
                'phone' => $faker->phoneNumber,
                'phone_urgent' => $faker->phoneNumber,
                'address' => $faker->address,
                'is_status' => $faker->boolean,

                'user_id' => User::factory()->create()->id,
                'job_id' => Job::factory()->create()->id,
            ]);
        }
    }
}
