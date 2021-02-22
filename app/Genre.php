<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'genre_user', 'genre_id', 'user_id');

        // return $this->belongsToMany('App\User');
    }
}
