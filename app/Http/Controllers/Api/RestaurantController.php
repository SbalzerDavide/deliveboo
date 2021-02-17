<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Genre;

class RestaurantController extends Controller
{
    public function index()
    
    {
       $users = User::all();
       $genres = Genre::all();

       dd($users->genres());

        if (!empty($_GET['name'])){

            $searchName = $_GET['name'];
        
            $users = User::where('name','like', "%$searchName%")->get();

        
        }else if (!empty($_GET['genre'])){

            $searchGenre = $_GET['genre'];

            
        
            // $users = DB::table('users')
            //     ->join('genre_user', 'users.id', '=', 'genre_user.user_id')
            //     ->where('genre', $searchGenre)
            //     ->get();

        
        };

    
       

       

       return response()->json($users);
    }
}
