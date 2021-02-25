<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\User;

class RestaurantController extends Controller
{
   public function filter($name)
   {
      // return $name;
      // if ($name == ''){
      //    return 'ciao';
      // }

   

      return view('filter', compact('name'));
   }
   public function index()
   {
      $genres = Genre::all();
      $users = User::all();
      return view('index', compact('genres', 'users'));
   }

}
