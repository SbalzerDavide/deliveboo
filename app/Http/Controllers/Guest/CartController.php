<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailCheck;
// use App\Http\Controllers\Guest\EmailCheck;
use Braintree\Gateway as Gateway;
use App\Dish;
use App\User;
use App\Order;


class CartController extends Controller
{
    public function add(Dish $dish){
        $sessionName = 'session'.$dish->user_id;
        // dd($sessionName);
        $cart = session()->get($sessionName);

        $message = $dish->name . ' was added to cart';

        if(!$cart){
            $cart = [
                $dish->id => [
                    'name' => $dish->name,
                    'quantity' => 1,
                    'price' => $dish->price, 
                    'ingredients' => $dish->ingredients,
                    'id' => $dish->id,
                    'path_image' => $dish->path_image,        
                ]
            ];
            session()->put($sessionName, $cart);
            return redirect()->back()->with('success', $dish->name);
        }

        

        if(isset($cart[$dish->id])){
            $cart[$dish->id]['quantity']++;
            session()->put($sessionName, $cart);

            return redirect()->back()->with('success',  $dish->name);
        }

        $cart[$dish->id] = [
            'name' => $dish->name,
            'quantity' => 1,
            'price' => $dish->price,
            'ingredients' => $dish->ingredients,
            'id' => $dish->id,
            'path_image' => $dish->path_image,               
        ];
        session()->put($sessionName, $cart);
        // dd($sessionName);
        return redirect()->back()->with('success',  $dish->name);
    }

        public function remove($id){
            $dish = Dish::find($id);
            $user_id = session()->get('actualRestaurant');
            $sessionName = 'session'.$user_id;

            $cart = session()->get($sessionName);

            if(isset($cart[$id])){
                unset($cart[$id]);
                session()->put($sessionName, $cart);
            }
            // dd($cart);




            //chiedere se serviva a qualcosa

            return redirect()->back()->with('deleted', $dish->name);
        }
        public function more($id){
            $user_id = session()->get('actualRestaurant');
            $sessionName = 'session'.$user_id;

            $cart = session()->get($sessionName);
            $dish = $cart[$id];
            $cart[$id]['quantity'] ++;
            session()->put($sessionName, $cart);

            // dd($cart);

            // if (!empty($_GET['firstName'])){
            //     $firstName = $_GET['firstName'];
            //     dd($firstName);
            // } else{
            //     dd('non ottenuto');
            // }
            // dd($data);
            return redirect()->back();
        }
        public function less($id){
            $user_id = session()->get('actualRestaurant');
            $sessionName = 'session'.$user_id;

            $cart = session()->get($sessionName);
            $dish = $cart[$id];
            $cart[$id]['quantity'] --;
            if($cart[$id]['quantity'] == 0){
                $dish = Dish::find($id);
                unset($cart[$id]);
                session()->put($sessionName, $cart);
                return redirect()->back()->with('deleted', $dish->name);

            }
            session()->put($sessionName, $cart);
            return redirect()->back();

            // if (!empty($_GET['firstName'])){
            //     $firstName = $_GET['firstName'];
            //     dd($firstName);
            // } else{
            //     dd('non ottenuto');
            // }
            
        }

        
        
        public function index($slug){
            $user = User::where('slug', $slug)->first();
            
            return view('cart.index', compact('user'));
        }

        public function store(Request $request){
            $data = $request->all();
            // dd($data);

            //total price
            $totalPrice = 0;
            foreach ($data['dish_id'] as $id){
                $dish = Dish::find($id);
                $totalPrice += $dish->price;
            }

            //new order 
            $newOrder =  new Order();
            $newOrder->_token = $data['_token'];
            $newOrder->price = $totalPrice;
            $saved = $newOrder->save();

            //dish attach
            $arrayDish =  $data['dish_id'];

            //create a record for every dish
            foreach($arrayDish as $dish){
                $newDish = Dish::find($dish);
                $newOrder->dishes()->attach($newDish);
            }

            //           
            //fare validazione dati odine
            //

            if($saved){
                return redirect()->route('guest.pay', $newOrder->id);
            }
        }
        public function pay($id){

            $order = Order::find($id);

            //pagamento
            $gateway = new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'hdycz8hvtgqw4vwp',
                'publicKey' => 's396d7m52twccwdp',
                'privateKey' => '5e330dca41a0f99c6fdb09d1e432a101'
            ]);
        
            $clientToken = $gateway->clientToken()->generate();
        
            return view('cart.payment', compact('order', 'clientToken'));
        }
        public function payment(Request $request, $id){

            $data = $request->all();
            // dd($data);
            $order = Order::find($id);
            
            $dishes = $order->dishes;
            foreach($dishes as $dish){
                $user_id= $dish->user->id;
            }
            $sessionName = 'session' . $user_id;
            // dd($sessionName);

            $gateway = new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'hdycz8hvtgqw4vwp',
                'publicKey' => 's396d7m52twccwdp',
                'privateKey' => '5e330dca41a0f99c6fdb09d1e432a101'
            ]);
        
    
            // $nonceFromTheClient = $_POST["payment_method_nonce"];
    
            $result = $gateway->transaction()->sale([
                'amount' => $order->price,
                'paymentMethodNonce' => $data['payment_method_nonce'],
                // 'paymentMethodNonce' => 'fake-valid-nonce',
                'options' => [
                'submitForSettlement' => True
                ]
            ]);
                  
            if ($result->success) {
                $transaction = $result->transaction;
                $order->order_status = 1;
                $order->save();
                // session($sessionName)->flush();
                // Session::flush();
                session()->forget($sessionName);
                // dd(session($sessionName));
                $message = 'La transazione è stata eseguita con sucesso';
                $email = $order->email;
                //   dd($result);

                // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
                // Mail::send('emails.TestMail' , $order->toArray() ,  function($message){
                //     $message->to('galanti_francesco@yahoo.it', 'Code Online')
                //          ->subject('Transaction done');
                // });
                Mail::to($email)->send(new EmailCheck);
                
                
                
                
                
                // Mail::send('emails.TestMail' , $order->toArray() ,  function($message){
                // $message->to('galanti_francesco@yahoo.it', 'Code Online')
                //         ->subject('Transaction done');
                // });
            } else {            
               /*  foreach($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }
                $message = 'La transazione non è andata a buon fine'; */
            
                // $_SESSION["errors"] = $errorString;
                // header("Location: " . $baseUrl . "index.php");
            }
    
    
    
            return redirect()->route('homepage')/* ->with('message', $message) */;
    
        }
        public function update(Request $request, $id){

            // GET DATA FROM FORM
            $data = $request->all();
            // dd($data);
            
            // VALIDATE
            $request->validate($this->validazioneOrder());
            
            // GET ORDER TO UPDATE
            $order = Order::find($id);
            // dd($order);
            
            
            
            // UPDATE DB
            $updated = $order->update($data); // <--- fillable nel Model
            
            // CHECK IF WORKED
            if($updated){
                return redirect()->route('guest.pay', $order->id);
            } else {
                return redirect()->route('homepage');
            }        


            // return 'update';
            // return view('cart.payment');
        }
        private function validazioneOrder(){
            return [
            'name'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            ];
        }
    
}

