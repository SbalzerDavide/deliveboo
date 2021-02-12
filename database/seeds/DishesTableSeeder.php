<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
use App\User;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {       
        $users = User::all();

        foreach($users as $user){

            for($i = 0; $i < 10; $i++){
                $newDish = new Dish();
    
                $newDish->user_id = $user->id;
                $newDish->name = $faker->words(3, true);
                $newDish->description = $faker->text(400);
                $newDish->ingredients = $faker->words(10, true);
                $newDish->price = $faker->randomFloat(2, 2, 50);
                $newDish->visibility = $faker->boolean();

                $newDish->save();

            }
        }
    }
}
