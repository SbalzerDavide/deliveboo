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
               <img width="350" src="{{asset('storage/' . $dish->path_image )}}" alt="">
          @endif
       
          <a class="btn btn-primary" href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>
       
          <form action="{{route('admin.restaurants.destroy', $dish->id)}}" method="POST">
          @csrf
          @method('DELETE')
               <input class="btn btn-danger" type="submit" value="Delete">
          </form>
    </main>

@endsection
