<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++ )
        {
           $newUser = new User();

           $newUser->name = $faker->words(2, true);
           $newUser->address = $faker->words(5, true);
           $newUser->PIva = $faker->word(10);
           $newUser->email  = $faker->unique()->email;
           $newUser->password = Hash::make('password');
           $newUser->save();

        }
    }
}
