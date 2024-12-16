<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 10), // Giả sử có 10 medicines
                'quantity' => $faker->numberBetween(1, 50),
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'customer_phone' => $faker->numerify('##########'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
