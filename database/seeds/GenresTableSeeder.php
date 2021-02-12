<?php

use Illuminate\Database\Seeder;
use App\Genre;
class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'pizza',
            'burger',
            'sushi',
            'dessert',
            'gelato',
            'vegan',
            'lunch',
            'dinner',
            'carne',
            'pesce',
        ];

        foreach($genres as $genre){
            $newGenre = new Genre();

            $newGenre->name = $genre;
            $newGenre->save();
        }
    }
}
