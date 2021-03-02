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
        $genres = Genre::all();

        for($i = 0; $i < 10; $i++ )
        {

            // $addGenre = ['2', '3'];
            // $newGenre = Genre::find(1);
            
            $newUser = new User();

            $newUser->name = $faker->words(2, true);
            $newUser->address = $faker->words(5, true);
            $newUser->PIva = $faker->word(10);
            $newUser->email  = $faker->unique()->email;
            $newUser->slug = Str::slug($newUser->name, '-');
            $newUser->password = Hash::make('password');
            $newUser->path_image = 'image/' . $i . '.jpg';



            
            //    $newUser->genres()->attach(
                //        $genres->random(rand(1, 3))->pluck('id')->toArray()
                //    ); 
                
            $newUser->save();
            // $newUser->genres()->attach($newGenre);


        };

        // $users = User::all();
        // foreach($users as $user){
        //     // $genreId = $faker->numberBetween(0, 10);
        //     $newGenre = Genre::find(1);
        //     $user->genres()->attach($newGenre);
        // }
        // $newGenre = Genre::find(1);
        // $user = User::find(1);
        
        // $user->genres()->attach($newGenre);




        // for ($i = 0; $i < 4; $i++ ){
        //     $genreId = $faker->numberBetween(0, 10);
        //     $newGenre = Genre::find($genreId);
        //     $user = User::find(1);
            
        //     $user->genres()->attach($newGenre);

        // }

        

    }
}
