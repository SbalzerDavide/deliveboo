<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ShowRestaurantController extends Controller
{
    public function show($slug)
    
    {
      $user = User::where('slug', $slug)->first();
        // dd($dish);
        // check if the slug is wrong
        if(empty($user)){
        abort(404);
        }

      return view('restaurantShow' , compact('user'));
    }
}
