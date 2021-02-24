@extends('layouts.app')

@section('content')
    <?php $cartSession = 'session' . $user->id ?>
    <h1> Restaurant Name {{$user->name}}</h1>
    <h2>lalakj</h2>

    <div class="container">

        <div class="row">
            <div class="col-sm-2">
                
                <a href="{{ route('guest.cart.index', $user->slug) }}" class="btn btn-primary  mt-3 mb-3 btn-block">
                    
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Cart
                    <!-- this code count product of choose tha user choose -->
                @if(session($cartSession))
                    <span class="badge badge-pill badge-danger">{{ count(session($cartSession)) }}</span>
                @endif
                </a>
            </div>
        </div>
            <ul>
                @foreach($user->dishes as $dish)
                    <li class="mb-2">
                        <a class="btn btn-primary" href="{{ route('guest.cart.add', $dish->id) }}">
                            {{$dish->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
    </div>

@endsection





{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <?php //$cartSession = 'session' . $user->id ?>
    <h1> Restaurant Name {{$user->name}}</h1>
    <h2>lalakj</h2>

    <div class="container">
    
        <div class="row">
            <div class="col-sm-2">
                
                <a href="{{ route('guest.cart.index', $user->slug) }}" class="btn btn-primary  mt-3 mb-3 btn-block">
                    
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Cart
                    <!-- this code count product of choose tha user choose -->
                @if(session($cartSession))
                    <span class="badge badge-pill badge-danger">{{ count(session($cartSession)) }}</span>
                @endif
                </a>
            </div>
        </div>
            <ul>
                @foreach($user->dishes as $dish)
                    <li class="mb-2">
                        <a class="btn btn-primary" href="{{ route('guest.cart.add', $dish->id) }}">
                            {{$dish->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
    </div>

</body>
</html>
 --}}
