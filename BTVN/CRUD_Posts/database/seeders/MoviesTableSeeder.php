<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách các cinema_id từ bảng cinemas
        $cinemaIds = DB::table('cinemas')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {  // Tạo 50 phim giả
            DB::table('movies')->insert([
                'title' => $faker->sentence,  // Tên phim
                'director' => $faker->name,  // Đạo diễn
                'release_date' => $faker->date,  // Ngày phát hành
                'duration' => $faker->numberBetween(80, 180),  // Thời gian (phút)
                'cinema_id' => $faker->randomElement($cinemaIds),  // Lấy cinema_id từ bảng cinemas
            ]);
        }
    }
}
