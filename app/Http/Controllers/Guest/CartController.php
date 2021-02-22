<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Order;


class CartController extends Controller
{
    public function add(Dish $dish){
        $sessionName = 'session'.$dish->user_id;
        // dd($sessionName);
        $cart = session()->get($sessionName);

        

        if(!$cart){
            $cart = [
                $dish->id => [
                    'name' => $dish->name,
                    'quantity' => 1,
                    'price' => $dish->price, 
                    'ingredients' => $dish->ingredients               
                ]
            ];
            session()->put($sessionName, $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        

        if(isset($cart[$dish->id])){
            $cart[$dish->id]['quantity']++;
            session()->put($sessionName, $cart);
            return redirect()->back()->with('success', "added to cart");
        }

        $cart[$dish->id] = [
            'name' => $dish->name,
            'quantity' => 1,
            'price' => $dish->price,
            'ingredients' => $dish->ingredients
        ];
        session()->put($sessionName, $cart);
        // dd($sessionName);
        return redirect()->back()->with('success', "added to cart");
    }


        // dd($dish);
        // \Cart::session($sessionKey);

        // add the product to cart
        // \Cart::session($dish)->add(array(
        //     'id' => uniqid($dish->id),
        //     'name' => $dish->name,
        //     'price' => $dish->price,
        //     'quantity' => 4,
        //     'attributes' => array(),
        //     'associatedModel' => $dish
        // ));

        // return redirect()->route('cart.index');

        public function remove($id){
            $cart = session()->get('cart');

            if(isset($cart[$id])){
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', "added to cart");
        }
        
        
        public function index($slug){
            $user = User::where('slug', $slug)->first();
            
            return view('cart.index', compact('user'));
        }

        public function store(Request $request){
            $data = $request->all();

            $newOrder =  new Order();

            $newOrder->fill($data);

            /* dd($data); */
            
            $saved = $newOrder->save();
            
            $data['dish_id'] = $newOrder->id;
           
            $newDish = Dish::find([2,4]);

            $newOrder->dishes()->attach($newDish);
           /*  $newDish->fill($data);
            $dishSaved = $newDish->save();
            $newOrder->dish()->attach([2,4]); 
            dd($newOrder); */
             
            if($saved){
                return redirect()->route('admin.home');
            }
        }
}

