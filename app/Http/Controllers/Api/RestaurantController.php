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

       if (!empty($_GET['name'])){

        $searchName = $_GET['name'];
    
        $users = User::where('name','like', "%$searchName%")->get();
    };
    
       

       

       return response()->json($users);
    }
}
