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

        $newDish = new Dish();
        // dd($newDish);
        $newDish->fill($data);
        $saved = $newDish->save();

        if($saved){
            return redirect()->route('admin.restaurants.show', $newDish->slug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //return $slug;
        $dish = Dish::where('slug', $slug)->first();
        // dd($dish);
        // check if the slug is wrong
        if(empty($dish)){
        abort(404);
        }
        return view('admin.restaurants.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $dish = Dish::where('slug', $slug)->first();

        return view('admin.restaurants.edit', compact('dish'));
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
        // GET DATA FROM FORM
        $data = $request->all();
        $data['user_id'] = Auth::id();
        
        // VALIDATE
        $request->validate($this->validazione());
        
        // GET POST TO UPDATE
        $dish = Dish::find($id);
        
        // UPDATE SLUG WHEN I CHANGE NAME
        $data['slug'] = Str::slug($data['name'], '-');
        
        // IF IMG CHANGE
        // check if I have an img posted
        if(!empty($data['path_image'])) {
            
            // delete previous one before posting the new one
            if(!empty($dish->path_image));{
            Storage::disk('public')->delete($dish->path_image);
            }
        
            // upload new img
            $data['path_image'] = Storage::disk('public')->put('image', $data['path_image']);
        }
        
        // UPDATE DB
        $updated = $dish->update($data); // <--- fillable nel Model
        
        // CHECK IF WORKED
        if($updated){
            return redirect()->route('admin.restaurants.show', $dish->slug);
        } else {
            return redirect()->route('homepage');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        
        // save title reference to pass to show which file has been deleted
        $name = $dish->name;
        
        // dd($dish);
        $deleted = $dish->delete();
        // dd($id);
        
        if($deleted){ 
            if(!empty($dish->path_image)){
                Storage::disk('public')->delete($dish->path_image);
            }
            return redirect()->route('admin.restaurants.index')->with('dish-deleted', $name);
        } else{
            return 'cancellazione non andata a buon fine';
        }
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
