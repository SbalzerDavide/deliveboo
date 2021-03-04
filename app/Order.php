<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function dishes() {
        return $this->belongsToMany('App\Dish', 'order_dish', 'order_id', 'dish_id');
    }

    protected $fillable = [
        '_token',
        'price',
        'name',
        'phone',
        'email',
        'address',
        'text'
    ];

  

}
