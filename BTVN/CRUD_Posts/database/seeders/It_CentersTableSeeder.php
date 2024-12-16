<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class It_CentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed 10 trung tâm tin học
        for ($i = 0; $i < 10; $i++) {
            DB::table('it_centers')->insert([
                'name' => $faker->company,
                'location' => $faker->address,
                'contact_email' => $faker->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
