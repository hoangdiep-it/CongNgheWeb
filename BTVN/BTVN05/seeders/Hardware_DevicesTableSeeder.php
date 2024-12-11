<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class Hardware_DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed 20 thiết bị phần cứng cho mỗi trung tâm IT
        for ($i = 0; $i < 20; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . $faker->word,
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,  // true hoặc false
                'center_id' => $faker->numberBetween(1, 10),  // center_id tham chiếu đến id của it_centers
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
