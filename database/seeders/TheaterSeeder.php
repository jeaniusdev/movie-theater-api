<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Theater;

class TheaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $theaters = ['AMC', 'Regal', 'Cinemark'];

        foreach (array_rand($theaters, 2) as $index) {
            Theater::create([
                'name' => $theaters[$index],
                'location' => $faker->address,
            ]);
        }
    }
}
