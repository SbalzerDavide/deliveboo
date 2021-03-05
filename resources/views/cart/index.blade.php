@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your cart <i class="fas fa-shopping-cart"></i></h2>
        <?php 
            session()->put('actualRestaurant', $user->id); 
        ?>
        @if (session('deleted'))
            <div class="alert alert-danger">
                <b>{{ session('deleted') }}</b> has been deleted from your cart
                
            </div>
           <!--  <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class="compra-inverso back-ho<span> ">
                <i class=" <fa fa-angle-left"></i> 
                <span> Back to the restaurant </span>
            </a> -->

        @endif
        <?php $total = 0 ?>
        <?php $cartSession = 'session' . $user->id ?>

        @if (empty(session($cartSession)))

            <h3 class="mt-5 mb-5">your cart is <span class="red-span">empty</span> </h3>

            <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class=" compra-inverso back-home">
                <i class="fa fa-angle-left"></i> 
                <span> Back to the restaurant </span>
            </a>

            
        @else
            <form action="{{ route('guest.store') }}" method="post">
                @csrf
                @method('POST')
    
                <table id="cart" class="table table-hover table-condensed table-compressed">
                    <thead>
                        <tr>
                            <th style="width:10%">image</th>
                            <th style="width:30%">Product</th>
                            <th style="width:13%">Price</th>
                            <th style="width:22%">Quantity</th>
                            <th style="width:15%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- by this code session get all product that user chose -->
                        @if(session($cartSession))
                        @foreach(session($cartSession) as $id => $dish)
                        
                        <?php $total += $dish['price'] * $dish['quantity'] ?>
                        
                        <tr >
                            <td data-th="image">
                                <div class="row">
                                    <div class="col-sm-9 ">
                                        @if ($dish['path_image'])
                                            <img src="{{asset('storage/' . $dish['path_image'])}}" alt="">
                                        @else
                                            <img src="{{asset('image/default_dish.jpg')}}" alt="default_image">
                                        @endif
                                        
                                    </div>
                                </div>
                            </td>
                            <td data-th="Product" >
                                <div class="row">
                                    <div class="col-sm-9 ">
                                         <h4 class="nomargin">{{ $dish['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"><span>{{ $dish['price'] }} €</span> </td>
                            <td data-th="Quantity">
                                {{-- <input type="number" style="width: 50px" value="{{ $dish['quantity'] }}" class="form-control quantity" /> --}}
                                <span>{{ $dish['quantity'] }}</span>
                                <a href="{{ route('guest.more', $id) }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="{{ route('guest.less', $id) }}" class="btn btn-primary">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                            <td data-th="Subtotal" class="text-center"><span>{{ $dish['price'] * $dish['quantity'] }} €</span></td>
                            <td class="actions" data-th="">
                              
                                <a href="{{ route('guest.remove', $id) }}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    <span>
                                        remove
                                    </span>  
                                </a>
                                {{-- <a href="{{ route('remove') }}">remove</a> --}}
                            </td>
                            {{-- @dump($dish) --}}
                        </tr>
                        @for ($i = 0; $i < $dish['quantity'] ; $i++)
                            <input type="hidden" name="dish_id[]" value="{{ $dish['id'] }}">
                        @endfor
                        <input type="hidden" name="quantity_id[{{ $dish['id'] }}]" value="{{ $dish['quantity'] }}">
                        @endforeach
                        @endif
                        {{-- @dump(session($cartSession)) --}}
                    </tbody>
                    <tfoot>
                        
                        <tr>
                            <td>
                                
                            </td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total {{ $total }} &euro;</strong></td>
                        </tr>
                    </tfoot>
                </table>

                {{-- MOBILE LAYOUT --}}
                <div class="cart container">
                    @if(session($cartSession))
                    @foreach(session($cartSession) as $id => $dish)
                    
                    <?php $total += $dish['price'] * $dish['quantity'] ?>

                    <div class="cart-box">
                        @if ($dish['path_image'])
                            <img src="{{asset('storage/' . $dish['path_image'])}}" alt="">
                        @else
                            <img src="{{asset('image/default_dish.jpg')}}" alt="default_image">
                        @endif
                        
                        <h4 class="nomargin">{{ $dish['name'] }}</h4>
                        
                        <p><span>Price : </span>{{ $dish['price'] }} €</p>
                        <div class="quantity">
                            <span class="dish"><span>Quantity : </span>{{ $dish['quantity'] }}</span>
                            
                            <a href="{{ route('guest.more', $id) }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a href="{{ route('guest.less', $id) }}" class="btn btn-primary">
                                <i class="fas fa-minus"></i>
                            </a>
                        </div>

                        <p><span>Subtotal : </span> {{ $dish['price'] * $dish['quantity'] }} €</p>

                        <a href="{{ route('guest.remove', $id) }}" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            remove
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>

                <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class="compra-inverso search-advanced-inverso">
                    <i class="fa fa-angle-left"></i> 
                    <span>
                        go back to dish
                    </span>
                </a>
                {{-- <input type="hidden" id="session" name="session" value="{{ $cartSession }}"> --}}
                <input type="submit" class="btn btn-primary" value="Go to payment">

    
            </form>
       
            
        @endif

            {{-- <a href="{{ route('guest.') }}">completa l'acquisto</a> --}}
@endsection
