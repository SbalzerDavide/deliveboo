<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
      $users = DB::table('users')->paginate(10);
      // $users = User::all()->paginate(5);
      return view('index', compact('genres', 'users'));
   }

}
