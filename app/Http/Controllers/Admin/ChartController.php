<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ChartController extends Controller
{
    public function index()
    {
      $user = User::where('id', Auth::id())->first();

      // dd($user);
      return view('admin.restaurants.orders.chart', compact('user'));


    }
}
