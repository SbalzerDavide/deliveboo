<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index(){
        // $data['user_id'] = Auth::id();
        // $user = Order::where('id', Auth::id())->first();

        // $data = DB::table('users')
        // ->join('dishes', 'users.id', '=', 'dishes.restaurant_id') ->join('orders', 'users.id', '=', 'orders.user_id') ->select('users.*', 'contacts.phone', 'orders.price')->get();

        $orders = DB::table('users')
        ->select('orders.id', 'orders.price',DB::raw('count(*) as total_dishes'))
        ->join('dishes', 'users.id', '=', 'dishes.user_id')
        ->join('order_dish', 'dishes.id', '=', 'order_dish.dish_id')
        ->join('orders', 'orders.id', '=', 'order_dish.order_id')
        ->where('users.id', Auth::id())
        ->groupBy('orders.id')
        ->where('orders.order_status', '1')
        ->get();
        // $users = DB::table('genre_user')
        // ->join('users', 'users.id', '=', 'genre_user.user_id')
        // ->join('genres', 'genres.id', '=', 'genre_user.genre_id')
        // ->where('genres.genre_name', $searchGenre)
        // ->where('users.name','like', "%$searchName%")
        // ->get();

        // $orders = $user->orders;
        // dd($orders);
        // $orders = Order::where('order_status', 1)->get();
        return view('admin.restaurants.orders.index', compact('orders'));
    }
}
