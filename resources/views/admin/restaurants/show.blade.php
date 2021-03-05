@extends('layouts.app')

@section('content')
    <main class="container">
          <h1>
               {{$dish->name}}
          </h1>
          <p>
               <b>Ingredients</b>: {{$dish->indgredients}}
          </p>
          <p>
               Description: {{$dish->description}}
          </p>
          <p>
               <b>Price</b>: {{$dish->price}} &euro;
          </p>
          @if (empty($dish->path_image))
               <img width="350" src="{{asset('image/default_dish.jpg')}}" alt="">
          @else
               <img width="350" src="{{asset('storage/' . $dish->path_image )}}" alt="">
          @endif
       
         <div class="button-dish-container">
             
               <a class="btn btn-primary button-dish " href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>
          
               <form action="{{route('admin.restaurants.destroy', $dish->id)}}" method="POST">
               @csrf
               @method('DELETE')
                    <input class="btn btn-danger button-dish" type="submit" value="Delete">
               </form>
              
         </div>
         <a  class="compra-inverso search-advanced-inverso" href="{{route('admin.restaurants.index')}}">
           <i class="fas fa-arrow-left"></i>

           <span class="ml-1"> go back to dish</span>   
         </a>      
    </main>

@endsection
