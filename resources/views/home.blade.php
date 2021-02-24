@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center">
            Visualizza i nostri Ristoranti
        </h2>
        <div class="restaurant-button">
          <a class="btn-list" href="{{route('Restaurant')}}">
            Ristoranti
          </a>
        </div>  
        <div >
	        <ul class="grid-container">
        	    @foreach ($genres as $genre)
                    <a href="{{ route('RestaurantByGenre', $genre->genre_name) }}">
                    <li>
                        <div>
                            <p>
                                {{ $genre->genre_name }}
                            </p>
                        </div>     
                        
                        <img  src="{{asset('image/' . $genre->url ) }}" alt="">
                    </li>

		            </a>
                @endforeach
            </ul>
        </div>
@endsection
