<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
</head>
<body>
      <header>
      <nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            DeliveBoodfsdf
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li>
                 
                </li>  
            </ul>
        </div>
    </div>
</nav>
      </header>
</body>
</html>
<h1> Restaurant Name {{$user->name}}</h1>
<h2>lalakj</h2>
<div class="container">

    <div class="row">
        <div class="col-sm-2">
            
            <a href="{{ route('guest.cart.index', $user->slug) }}" class="btn btn-primary  mt-3 mb-3 btn-block">
                
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Cart
                <!-- this code count product of choose tha user choose -->
                
                {{-- <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span> --}}
            </a>
            @if(session('cart'))
            @endif
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

