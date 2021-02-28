<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
        
        //prova per collegamento da blade
        // return $this->belongsToMany('App\Order', 'order_dish', 'dish_id', 'order_id');
    }

    protected $fillable = [
        'name', 'slug', 'description', 'ingredients', 'price', 'visibility', 'path_image', 'user_id'
    ];

}
