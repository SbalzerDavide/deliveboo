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
    }

    protected $fillable = [
        'name', 'slug', 'description', 'ingredients', 'price', 'visibility', 'path_image', 'user_id'
    ];

}
