<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->randomElement(['10mg', '20mg', '50mg']),
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']),
                'price' => $faker->randomFloat(2, 10, 500),
                'stock' => $faker->numberBetween(50, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
