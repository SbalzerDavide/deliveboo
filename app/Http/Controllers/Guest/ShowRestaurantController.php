<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ShowRestaurantController extends Controller
{
    public function show($slug)
    
    {
      return $slug;
    }
}
