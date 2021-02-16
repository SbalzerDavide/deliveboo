<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
   public function show($name)
   {
      return $name;
      // if ($name != ''){
      //    return $name;
      // }

      //return view('index', compact('name'));
   }
}
