@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>your cart</h2>
        <?php 
            session()->put('actualRestaurant', $user->id); 
        ?>
        @if (session('deleted'))
            <div class="alert alert-danger">
                <b>{{ session('deleted') }}</b> has been deleted from your cart
                
            </div>
            <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class="btn btn-warning">
                <i class="fa fa-angle-left"></i> 
                Back to the cart
            </a>

        @endif
        <?php $total = 0 ?>
        <?php $cartSession = 'session' . $user->id ?>

        @if (empty(session($cartSession)))

            <h3>your cart is empty</h3>

            <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class="btn btn-warning">
                <i class="fa fa-angle-left"></i> 
                Back to the cart
            </a>

            
        @else
        <div >
            <form action="{{ route('guest.store') }}" method="post">
                @csrf
                @method('POST')
    
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th style="width:10%">image</th>
                            <th style="width:30%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:22%">Quantity</th>
                            <th style="width:15%" class="text-center">Subtotal</th>
                            <th style="width:13%"></th>
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
                                            <img height="80" src="{{asset('storage/' . $dish['path_image'])}}" alt="">
                                        @else
                                            <img height="80" src="{{asset('image/default_dish.jpg')}}" alt="default_image">
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
                            <td data-th="Price">{{ $dish['price'] }} €</td>
                            <td data-th="Quantity">
                                {{-- <input type="number" style="width: 50px" value="{{ $dish['quantity'] }}" class="form-control quantity" /> --}}
                                <span class="mr-3">{{ $dish['quantity'] }}</span>
                                <a href="{{ route('guest.more', $id) }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="{{ route('guest.less', $id) }}" class="btn btn-primary">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                            <td data-th="Subtotal" class="text-center">{{ $dish['price'] * $dish['quantity'] }} €</td>
                            <td class="actions" data-th="">
                                <!-- this button is to update card -->
                                {{-- <div class="btn btn-primary" @click="changeQuantity({{ $dish['quantity'] }})">change</div> --}}
                                {{-- <button class="btn btn-info btn-sm update-cart" >
                                    <i class="fas fa-sync-alt"></i>
                                    update
                                </button> --}}
    
                                {{-- <a href="{{ route('update-cart') }}">update</a> --}}
                                <!-- this button is for update card -->
                                {{-- <button class="btn btn-danger btn-sm remove" data-id="{{ $id }}" >
                                    <i class="fa fa-trash"></i>
                                    remove
                                </button> --}}
                                {{-- @dump($data) --}}
                                {{-- <div class="action">
                                    <form action="{{ route('guest.remove') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="hidden" name="dish_id" value="{{$id}}">
                                        <input type="submit" value="delete">
                                    </form>
                                </div> --}}
                                <a href="{{ route('guest.remove', $id) }}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    remove
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
                <a href="{{ route('guest.RestaurantShow', $user->slug) }}" class="compra-inverso search-advanced-inverso">
                    <i class="fa fa-angle-left"></i> 
                    <span>
                        go back to dish
                    </span>
                </a>
                {{-- <input type="hidden" id="session" name="session" value="{{ $cartSession }}"> --}}
                <input type="submit" class="btn btn-primary" value="Go to payment">
    
            </form>
        </div>
            
        @endif

            {{-- <a href="{{ route('guest.') }}">completa l'acquisto</a> --}}
@endsection
