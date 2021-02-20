<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        '_token',
        'order_number',
        'order_status',
        'price',
        'quantity'
    ];

  

}
