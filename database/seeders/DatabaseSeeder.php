<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Job;
use App\Models\Supplier;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Job::factory(4)->create();
        ProductCategory::factory(4)->create();

        Product::factory(50)->create();
        Supplier::factory(20)->create();
        Customer::factory(10)->create();

        $this->call(AdminUserSeeder::class);
        $this->call(EmployeeSeeder::class);
        Order::factory(10)->create();
    }
}
