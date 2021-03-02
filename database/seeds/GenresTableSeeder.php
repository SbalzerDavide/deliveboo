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
            [
                'name' => 'pizza',
                'url' => 'pizza.jpg'
            ],
            [
                'name' => 'burger',
                'url' => 'burger.jpg'
            ],
            [
                'name' => 'sushi',
                'url' => 'sushi.jpg'
            ],
            [
                'name' => 'dessert',
                'url' => 'dessert.jpg'
            ],
            [
                'name' => 'gelato',
                'url' => 'gelato.jpg'
            ],
            [
                'name' => 'vegan',
                'url' => 'vegan.jpg'
            ],
            [
                'name' => 'lunch',
                'url' => 'lunch.jpg'
            ],
            [
                'name' => 'dinner',
                'url' => 'diner.jpg'
            ],
            [
                'name' => 'carne',
                'url' => 'carne.jpg'
            ],
            [
                'name' => 'pesce',
                'url' => 'pesce.jpg'
            ],
        ];
        $count = 0;

        $takeGenres = Genre::all();
        foreach($takeGenres as $genre){
            $count = $count +1;
        };
        if($count == 0){
            foreach($genres as $genre){
                $newGenre = new Genre();
            
                $newGenre->genre_name = $genre['name'];
                $newGenre->url = $genre['url'];
                $newGenre->save();
            }
        }


    }
}
