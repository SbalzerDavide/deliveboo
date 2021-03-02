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
            // $countGenre = (count( $searchGenre));


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
                $countGenre = (count( $searchGenre));
    
                // dd($searchGenre);
                $count = DB::table('genre_user')
                    ->join('users', 'users.id', '=', 'genre_user.user_id')
                    ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
                    ->select('users.name', DB::raw('count(*) as total'))
                    ->whereIn('genres.genre_name', $searchGenre)
                    ->groupBy('users.name')
                    ->get();
                    // dd($count[0]);
                $listRestaurant = [];
                foreach($count as $element){
                    if ($element->total ==  $countGenre){
                        // dump($element->name);
                        array_push($listRestaurant, $element->name);
                    }
                }
                // dump($listRestaurant);
    
                $users = User::wherein('name',$listRestaurant)->get(); 
    
                // dd($users);
    
    
            //     $users = DB::table('genre_user')
            //         ->join('users', 'users.id', '=', 'genre_user.user_id')
            //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
            //         ->where($count , $countGenre)
            //         ->get();
    
            }
        }

        // if (!empty($_GET['genre'])){
        //     $searchGenre = $_GET['genre'];
        //     $countGenre = (count( $searchGenre));

        //     // dd($searchGenre);
        //     $count = DB::table('genre_user')
        //         ->join('users', 'users.id', '=', 'genre_user.user_id')
        //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        //         ->select('users.name', DB::raw('count(*) as total'))
        //         ->whereIn('genres.genre_name', $searchGenre)
        //         ->groupBy('users.name')
        //         ->get();
        //         // dd($count[0]);
        //     $listRestaurant = [];
        //     foreach($count as $element){
        //         if ($element->total ==  $countGenre){
        //             // dump($element->name);
        //             array_push($listRestaurant, $element->name);
        //         }
        //     }
        //     // dump($listRestaurant);

        //     $users = User::wherein('name',$listRestaurant)->get(); 

        //     // dd($users);


        // //     $users = DB::table('genre_user')
        // //         ->join('users', 'users.id', '=', 'genre_user.user_id')
        // //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        // //         ->where($count , $countGenre)
        // //         ->get();

        // }

        // if (!empty($_GET['genre'])){
        //     $searchGenre = $_GET['genre'];
        //     // dd($searchGenre);
        //     $countGenre = (count( $searchGenre));
        //     // dd($query->select( DB::raw('count(*) as total'))
        //     //     ->whereIn('genres.genre_name', $searchGenre)
        //     //     ->groupBy('users.name'));


        //     // dd($searchGenre);
        //     $users = DB::table('genre_user')
        //         ->join('users', 'users.id', '=', 'genre_user.user_id')
        //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        //         ->where(function ($query){
        //             $searchGenre = $_GET['genre'];
        //             $query->select(DB::raw('count(*) as total'))
        //             ->whereIn('genres.genre_name', $searchGenre)
        //             ->groupBy('users.name');
        //             // dd($searchGenre);
        //         }, $countGenre)
        //         ->get();
        //         dump($users);
        //         // dump($query->select( DB::raw('count(*) as total'))
        //         // ->whereIn('genres.genre_name', $searchGenre)
        //         // ->groupBy('users.name'));
        //     // $users = DB::table('genre_user')
        //     //     ->join('users', 'users.id', '=', 'genre_user.user_id')
        //     //     ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        //     //     ->where($count , $countGenre)
        //     //     ->get();

        // }








        // if(!empty($_GET['genre'])){
        //     $searchGenre = $_GET['genre'];
        //     $users = DB::table('genre_user')
        //         ->join('users', 'users.id', '=', 'genre_user.user_id')
        //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        //         ->where('genres.genre_name', $searchGenre)
        //         ->get();
        // };
    
       return response()->json($users);
    }
}




// copia
// <?php
// namespace App\Http\Controllers\Api;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;
// use App\User;
// use App\Genre;
// class RestaurantController extends Controller
// {
//     public function index()
//     {
//         $users = User::all();
//         $genres = Genre::all();

//         if (!empty($_GET['name']) && !empty($_GET['genre'])){

//             $searchName = $_GET['name'];
//             $searchGenre = $_GET['genre'];
//             $users = DB::table('genre_user')
//                 ->join('users', 'users.id', '=', 'genre_user.user_id')
//                 ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//                 ->where('genres.genre_name', $searchGenre)
//                 ->where('users.name','like', "%$searchName%")
//                 ->get();
//         }elseif (!empty($_GET['name']) || !empty($_GET['genre'])){

//             if (!empty($_GET['name'])){
//                 $searchName = $_GET['name'];
//                 $users = User::where('name','like', "%$searchName%")->get();
//             }elseif (!empty($_GET['genre'])){
//                 $searchGenre = $_GET['genre'];
//                 $countGenre = (count( $searchGenre));
    
//                 // dd($searchGenre);
//                 $count = DB::table('genre_user')
//                     ->join('users', 'users.id', '=', 'genre_user.user_id')
//                     ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//                     ->select('users.name', DB::raw('count(*) as total'))
//                     ->whereIn('genres.genre_name', $searchGenre)
//                     ->groupBy('users.name')
//                     ->get();
//                     // dd($count[0]);
//                 $listRestaurant = [];
//                 foreach($count as $element){
//                     if ($element->total ==  $countGenre){
//                         // dump($element->name);
//                         array_push($listRestaurant, $element->name);
//                     }
//                 }
//                 // dump($listRestaurant);
    
//                 $users = User::wherein('name',$listRestaurant)->get(); 
    
//                 // dd($users);
    
    
//             //     $users = DB::table('genre_user')
//             //         ->join('users', 'users.id', '=', 'genre_user.user_id')
//             //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//             //         ->where($count , $countGenre)
//             //         ->get();
    
//             }
//         }

//         // if (!empty($_GET['genre'])){
//         //     $searchGenre = $_GET['genre'];
//         //     $countGenre = (count( $searchGenre));

//         //     // dd($searchGenre);
//         //     $count = DB::table('genre_user')
//         //         ->join('users', 'users.id', '=', 'genre_user.user_id')
//         //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//         //         ->select('users.name', DB::raw('count(*) as total'))
//         //         ->whereIn('genres.genre_name', $searchGenre)
//         //         ->groupBy('users.name')
//         //         ->get();
//         //         // dd($count[0]);
//         //     $listRestaurant = [];
//         //     foreach($count as $element){
//         //         if ($element->total ==  $countGenre){
//         //             // dump($element->name);
//         //             array_push($listRestaurant, $element->name);
//         //         }
//         //     }
//         //     // dump($listRestaurant);

//         //     $users = User::wherein('name',$listRestaurant)->get(); 

//         //     // dd($users);


//         // //     $users = DB::table('genre_user')
//         // //         ->join('users', 'users.id', '=', 'genre_user.user_id')
//         // //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//         // //         ->where($count , $countGenre)
//         // //         ->get();

//         // }

//         // if (!empty($_GET['genre'])){
//         //     $searchGenre = $_GET['genre'];
//         //     // dd($searchGenre);
//         //     $countGenre = (count( $searchGenre));
//         //     // dd($query->select( DB::raw('count(*) as total'))
//         //     //     ->whereIn('genres.genre_name', $searchGenre)
//         //     //     ->groupBy('users.name'));


//         //     // dd($searchGenre);
//         //     $users = DB::table('genre_user')
//         //         ->join('users', 'users.id', '=', 'genre_user.user_id')
//         //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//         //         ->where(function ($query){
//         //             $searchGenre = $_GET['genre'];
//         //             $query->select(DB::raw('count(*) as total'))
//         //             ->whereIn('genres.genre_name', $searchGenre)
//         //             ->groupBy('users.name');
//         //             // dd($searchGenre);
//         //         }, $countGenre)
//         //         ->get();
//         //         dump($users);
//         //         // dump($query->select( DB::raw('count(*) as total'))
//         //         // ->whereIn('genres.genre_name', $searchGenre)
//         //         // ->groupBy('users.name'));
//         //     // $users = DB::table('genre_user')
//         //     //     ->join('users', 'users.id', '=', 'genre_user.user_id')
//         //     //     ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//         //     //     ->where($count , $countGenre)
//         //     //     ->get();

//         // }








//         // if(!empty($_GET['genre'])){
//         //     $searchGenre = $_GET['genre'];
//         //     $users = DB::table('genre_user')
//         //         ->join('users', 'users.id', '=', 'genre_user.user_id')
//         //         ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
//         //         ->where('genres.genre_name', $searchGenre)
//         //         ->get();
//         // };
    
//        return response()->json($users);
//     }
// }