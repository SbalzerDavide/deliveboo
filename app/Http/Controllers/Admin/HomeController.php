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

        $user = User::where('id', Auth::id())->get();
        // dd($user);
           if (!empty($data['path_image'])) {
            $data['path_image'] = Storage::disk('public')->put('image', $data['path_image']);
        } 
        return view('admin.home', compact('user'));
    }
}
