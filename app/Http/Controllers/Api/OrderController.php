<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;
use Carbon\Carbon;

class OrderController extends Controller
{
   public function index()
   {
      if (!empty($_GET['id']) && !empty($_GET['year'])){
         $id = $_GET['id'];
         $year = $_GET['year'];

         $orders = DB::table('orders')
         /*    ->select('orders.id', DB::raw('sum(orders.price) as total')) */
            ->select(DB::raw('MONTH(orders.created_at) as month'), 'orders.price', 'orders.id')
            ->join('order_dish', 'orders.id', '=', 'order_dish.order_id')
            ->join('dishes', 'dishes.id', '=', 'order_dish.dish_id')
            ->join('users', 'users.id', '=', 'dishes.user_id')
            ->where('users.id', $id) //sostituire con auth oppure con id arrivato da axios
            // ->where('users.id', 2)
            ->where('orders.order_status', 1 )
            ->whereYear('orders.created_at', $year)
            ->groupBy('orders.id')
            // ->groupBy('month')
            // >groupBy(function($item) {
            //    return Carbon::createFromFormat('Y-m-d', $item->created_at)->format('Y-W');
            // })
            // ->groupBy('year')
            ->get();

      }



      // $orders = DB::table('users')
      // /*    ->select('orders.id', DB::raw('sum(orders.price) as total')) */
      //    ->select(DB::raw('MONTH(orders.created_at) as month'), 'orders.id', 'orders.price')
      //    ->join('dishes', 'users.id', '=', 'dishes.user_id')
      //    ->join('order_dish', 'dishes.id', '=', 'order_dish.dish_id')
      //    ->join('orders', 'orders.id', '=', 'order_dish.order_id')
      //    // ->where('users.id', Auth::id())
      //    ->where('users.id', 2)
      //    ->where('orders.order_status', 1 )
      //    ->whereYear('orders.created_at', 2021)
      //    // ->groupBy('month')
      //    // >groupBy(function($item) {
      //    //    return Carbon::createFromFormat('Y-m-d', $item->created_at)->format('Y-W');
      //    // })
      //    // ->groupBy('year')
      //    ->get();


      // $orders = DB::table('orders')
      // /*    ->select('orders.id', DB::raw('sum(orders.price) as total')) */
      //    ->select(DB::raw('MONTH(created_at) as month'), 'id', 'price')
      //    ->join('dishes', 'users.id', '=', 'dishes.user_id')
      //    ->join('order_dish', 'dishes.id', '=', 'order_dish.dish_id')
      //    ->join('orders', 'orders.id', '=', 'order_dish.order_id')
      //    // ->where('users.id', Auth::id())
      //    ->where('users.id', 3)
      //    ->where('order_status', 1 )
      //    ->whereYear('created_at', 2021)
      //    // ->groupBy('month')
      //    // >groupBy(function($item) {
      //    //    return Carbon::createFromFormat('Y-m-d', $item->created_at)->format('Y-W');
      //    // })
      //    // ->groupBy('year')
      //    ->get();
         // ->sum('price');
         // $weeklyQuotes = $orders->groupBy(function($order) {
         //    return Carbon::createFromFormat('Y-m-d', $order->created_at)->format('Y-W');
         // });

         // $orders = DB::table('orders')
         //    ->select(DB::raw('MONTH(created_at) as month'), 'price',DB::raw("SUM(price) as total_price"))
         //    ->where('order_status', 1 )
         //    ->whereYear('created_at', 2021)
         //    ->groupBy('month')
         //    ->get();
         //    // ->sum('price');
   
   

         // $months = Order::select(DB::raw('MONTH("created_at") as month'))->groupBy('month')->get();

         

       return response()->json($orders);
   }
}
