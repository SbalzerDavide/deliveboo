@extends('layouts.app')

@section('content')
    <main class="container">
       <h1>
            Dish name: {{$dish->name}}
       </h1>
       <p>
            Ingredients: {{$dish->indgredients}}
       </p>
       <p>
            Description: {{$dish->description}}
       </p>
       <p>
           Price: {{$dish->price}} &euro;
       </p>
       @if (empty($dish->path_image))
           <img width="350" src="{{asset('image/default-img.png')}}" alt="">
       @else
       <img src="{{asset('storage/' . $dish->path_image )}}" alt="">
       @endif
    </main>

   

@endsection
