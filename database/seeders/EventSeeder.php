<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 80) as $index) {
            $start = $faker->dateTimeBetween('-1 month', '+1 month');
            $end = (clone $start)->modify('+'.rand(1, 8).' hours');

            Event::create([
                'title' => $faker->sentence(rand(2, 5)),
                'description' => $faker->paragraph,
                'start' => $start,
                'end' => $end,
                'color' => $faker->hexColor,
                'all_day' => $faker->boolean,
                'user_id' => $faker->numberBetween(1, 3), // Sesuaikan dengan id pengguna dalam DB anda
            ]);
        }
    }
}
