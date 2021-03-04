<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
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

        $dishesName = [
            'Lasagne al pesto',
            'Migliaccio',
            'Arrosto di vitello al forno',
            'Bomboloni al forno',
            'Gratin di cavolfiori e broccoli',
            'Chiacchiere',
            'Orecchiette con cime di rapa',
            'Spezzatino di vitello con patate',
            'Broccoli croccanti al forno',
            'Graffe',
            'Mele cotte al forno',
            'Torta sbrisolona',
            'Insalata di puntarelle',
            'Pasta zucchine e speck',
            'Carote al forno con taleggio',
            'Zuppa di ceci neri',
            'Cavolo riccio viola in padella',
            'Crostata morbida alle more',
            'Millefoglie alla crema pasticcera',
            'Riso al latte di cocco',
            'Torta sabbiosa',
            'Cheecake cotta alla ricotta',
            'Ramen',
            'Carciofi e patate in padella',
            'Insalata di cavolo cappuccino',
            'Rana pescatrice al sugo di pomodoro',
            'Frittelle di riso',
            'Cardi gratinati con besciamella',
            'Pinza bolognese',
            'Totani e patate al forno'
        ];

        foreach($users as $user){

            for($i = 0; $i < 10; $i++){
                $random = $faker->numberBetween(0, 13);
                $randomForName = $faker->numberBetween(0, 29);
                $newDish = new Dish();
    
                $newDish->user_id = $user->id;
                $newDish->name = $dishesName[$randomForName];
                $newDish->slug = Str::slug($newDish->name, '-');
                $newDish->description = $faker->text(400);
                $newDish->ingredients = $faker->words(10, true);
                $newDish->price = $faker->randomFloat(2, 2, 50);
                $newDish->visibility = $faker->boolean();
                $newDish->path_image = 'image/dish-' . $random . '.jpg';

                $newDish->save();

            }
        }
    }
}
