<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {  // Tạo 10 rạp chiếu giả
            DB::table('cinemas')->insert([
                'name' => $faker->company . ' Cinema',  // Tên rạp chiếu
                'location' => $faker->address,  // Địa chỉ
                'total_seats' => $faker->numberBetween(100, 500),  // Tổng số ghế ngồi
            ]);
        }
    }
}
