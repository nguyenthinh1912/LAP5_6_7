<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = ['Hành động', 'Hài hước', 'Kinh dị', 'Viễn tưởng', 'Tình cảm'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
