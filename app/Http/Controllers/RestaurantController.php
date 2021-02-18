<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class RestaurantController extends Controller
{
   public function filter($name)
   {
      // return $name;
      if ($name == ''){
         return 'ciao';
      }

      return view('filter', compact('name'));
   }
   public function index()
   {
      
      return view('index',);
   }

}
