<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    public function index()
    
    {
       $users = User::all();


       

       

       return response()->json($users);
    }
}