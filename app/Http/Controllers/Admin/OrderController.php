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

        $orders = DB::table('users')
            ->select('orders.id', 'orders.price',DB::raw('count(*) as total_dishes'))
            ->join('dishes', 'users.id', '=', 'dishes.user_id')
            ->join('order_dish', 'dishes.id', '=', 'order_dish.dish_id')
            ->join('orders', 'orders.id', '=', 'order_dish.order_id')
            ->where('users.id', Auth::id())
            ->groupBy('orders.id')
            ->where('orders.order_status', '1')
            ->get();
        // $user = User::where('id', Auth::id())->first();
        // dd($user);


        return view('admin.restaurants.orders.index', compact('orders'));
    }
}
