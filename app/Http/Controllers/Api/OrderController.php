<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
       $orders = DB::table('orders')
      /*    ->select('orders.id', DB::raw('sum(orders.price) as total')) */
         ->select(DB::raw('YEAR(created_at) as year'))
         ->where('order_status', 1 )
         ->whereYear('created_at', 2021)
         ->groupBy('year')
         ->sum('price');

         

       return response()->json($orders);
    }
}
