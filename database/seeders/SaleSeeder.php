<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Sale;
use App\Models\Showing;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $showings = Showing::all();

        foreach ($showings as $showing) {
            for ($i = 0; $i < 2; $i++) {
                Sale::create([
                    'showing_id' => $showing->id,
                    'date' => $faker->dateTimeBetween('-2 days', 'now'),
                    'amount' => $faker->randomFloat(2, 10, 100),
                ]);
            }
        }
    }
}
