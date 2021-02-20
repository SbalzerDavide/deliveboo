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
            DeliveBoo
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <a class="btn btn-primary" href="{{ route('cart.index') }}">
                <i class="fas fa-cart-arrow-down"></i>
            </a>

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
        <ul>
        @foreach($user->dishes as $dish)
           <li>
               <a class="btn btn-primary" href="{{ route('cart.add', $dish->id) }}">
                   {{$dish->name}}
               </a>
           </li>
        </ul>
        @endforeach
</div>

