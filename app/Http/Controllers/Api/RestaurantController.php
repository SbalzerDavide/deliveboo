<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Genre;

class RestaurantController extends Controller
{
    public function index()
    
    {
       $users = User::all();
       $genres = Genre::all();

    //    dd($users->genres());

        // if (!empty($_GET['name'])){

        //     $searchName = $_GET['name'];
        
        //     $users = User::where('name','like', "%$searchName%")->get();

        
        // }else
        if (!empty($_GET['genre'])){

            $searchGenre = $_GET['genre'];

            // $usersPivot = User::table('users')
            // ->join('genre_user', 'users.id', '=', 'genre_user.user_id')
            // ->join('genres', 'genre_user.genr_id', '=', 'genres.id')
            // ->get();


            // $usersPivot = DB::table('users')->join('genre_user', 'users.id', '=', 'genre_user.user_id')->get();
            $users = DB::table('genre_user')
                ->join('users', 'users.id', '=', 'genre_user.user_id')
                ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
                ->where('genres.name', $searchGenre)
                ->get();

                
          
           
        
            // $users = DB::table('users')
            //     ->join('genre_user', 'users.id', '=', 'genre_user.user_id')
            //     ->where('genre', $searchGenre)
            //     ->get();

        
        };

    
       

       

       return response()->json($users);
    }
}
