<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){

        $user = User::where('id', Auth::id())->first();
         //dd($user);
        
        return view('admin.home', compact('user'));
    }
}
