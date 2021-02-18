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

        if (!empty($_GET['name']) && !empty($_GET['genre'])){

            $searchName = $_GET['name'];
            $searchGenre = $_GET['genre'];
            $users = DB::table('genre_user')
                ->join('users', 'users.id', '=', 'genre_user.user_id')
                ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
                ->where('genres.genre_name', $searchGenre)
                ->where('users.name','like', "%$searchName%")
                ->get();
        }elseif (!empty($_GET['name']) || !empty($_GET['genre'])){

            if (!empty($_GET['name'])){
                $searchName = $_GET['name'];
                $users = User::where('name','like', "%$searchName%")->get();
            }elseif (!empty($_GET['genre'])){
                $searchGenre = $_GET['genre'];
                $users = DB::table('genre_user')
                    ->join('users', 'users.id', '=', 'genre_user.user_id')
                    ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
                    ->where('genres.genre_name', $searchGenre)
                    ->get();
            };
        }
       return response()->json($users);
    }
}