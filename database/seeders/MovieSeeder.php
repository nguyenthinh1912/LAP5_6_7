<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $genres = Genre::pluck('id')->toArray(); // Lấy danh sách thể loại

        for ($i = 0; $i < 50; $i++) {
            Movie::create([
                'title' => $faker->sentence(3),
                'poster' => $faker->imageUrl(200, 300, 'movies'),
                'intro' => $faker->paragraph(),
                'release_date' => $faker->date(),
                'genre_id' => $faker->randomElement($genres),
            ]);
        }
    }
}
