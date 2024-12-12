<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->dateTimeBetween('-10 years', '-4 years')->format('Y-m-d'),
                'parent_phone' => $faker->numerify('09########'),
                'class_id' => $faker->numberBetween(1, 5), // Giả sử có 5 lớp được tạo ở classes
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
