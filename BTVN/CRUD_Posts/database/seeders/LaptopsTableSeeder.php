<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Asus', 'Apple']),
                'model' => $faker->bothify('Model-####'),
                'specifications' => $faker->randomElement([
                    'i5, 8GB RAM, 256GB SSD',
                    'i7, 16GB RAM, 512GB SSD',
                    'Ryzen 5, 8GB RAM, 1TB HDD',
                ]),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->boolean ? $faker->numberBetween(1, 20) : null, // Assign renter_id randomly
            ]);
        }
    }
}
