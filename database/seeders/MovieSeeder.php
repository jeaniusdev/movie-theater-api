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

        $movieTitles = [
            'Forrest Gump',
            'Inception',
            'Fight Club',
            'The Matrix',
        ];

        foreach (array_rand($movieTitles, 2) as $index) {
            Movie::create([
                'name' => $movieTitles[$index],
                'genre' => $faker->randomElement(['Action', 'Drama', 'Sci-Fi']),
                'language' => 'English',
            ]);
        }
    }
}
