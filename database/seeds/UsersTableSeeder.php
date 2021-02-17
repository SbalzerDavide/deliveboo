<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use App\Genre;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $genres = Genre::all();

        for($i = 0; $i < 10; $i++ )
        {

           $addGenre = ['2', '3'];
            
           $newUser = new User();

           $newUser->name = $faker->words(2, true);
           $newUser->address = $faker->words(5, true);
           $newUser->PIva = $faker->word(10);
           $newUser->email  = $faker->unique()->email;
           $newUser->slug = Str::slug($newUser->name, '-');
           $newUser->password = Hash::make('password');

        //    $newUser->genres()->attach($addGenre); 

           $newUser->save();

        }
    }
}
