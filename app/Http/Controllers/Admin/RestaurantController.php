<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Dish;
use App\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dishes = Dish::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('admin.restaurants.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $request->validate($this->validazione());

        $data['slug'] = Str::slug($data['name'], '-');
        $data['user_id'] = Auth::id();
        // dd($data);
        
        if(!empty($data['path_image'])){
            $data['path_image'] = Storage::disk('public')->put('image', $data['path_image'] );
        }
        // dd($data);

        // if(!empty($data['path_image'])){
        //     $data['path_image'] = Storage::disk('public')->put('images' , $data['path_image']);
        // };
        // dd($data['path_image']);

        $newDish = new Dish();
        // dd($newDish);
        $newDish->fill($data);
        $saved = $newDish->save();

        if($saved){
            return redirect()->route('admin.restaurants.index');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validazione(){
        return [
        'name'=> 'required',
        'description'=> 'required',
        'ingredients'=> 'required',
        'price'=> 'required',
        'visibility'=> '',
        'path_image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
