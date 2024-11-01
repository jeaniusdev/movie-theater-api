<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 2; $i++) {
            Movie::create([
                'name' => $faker->randomElement([
                    'Forrest Gump',
                    'Inception',
                    'Fight Club',
                    'The Matrix',
                ]),
                'genre' => $faker->randomElement(['Action', 'Comedy', 'Drama', 'Animation', 'Romance']),
                'language' => $faker->randomElement(['English', 'Spanish', 'French', 'German']),
            ]);
        }
    }
}
