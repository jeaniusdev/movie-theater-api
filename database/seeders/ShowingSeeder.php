<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Showing;
use App\Models\Movie;
use App\Models\Theater;

class ShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $movies = Movie::all();
        $theaters = Theater::all();

        foreach ($movies as $movie) {
            foreach ($theaters as $theater) {
                Showing::create([
                    'movie_id' => $movie->id,
                    'theater_id' => $theater->id,
                    'showing_datetime' => $faker->dateTimeBetween('now', '+2 days'),
                ]);
            }
        }
    }
}
