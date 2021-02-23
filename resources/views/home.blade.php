@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('Restaurant')}}">
            Ristoranti
        </a>
        <div >
	        <ul class="grid-container">
        	    @foreach ($genres as $genre)
                    <a href="{{ route('RestaurantByGenre', $genre->genre_name) }}">
                    <li>
                        {{ $genre->genre_name }}                    
      		        </li>
		            </a>
                @endforeach
            </ul>
        </div>
@endsection
