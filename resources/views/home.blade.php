@extends('layouts.home')

@section('content')

    <div class="container home">

        <h2 class="text-center ">Select a genre</h2>
       
        <div >
	        <ul class="grid-container">
        	    @foreach ($genres as $genre)
                    <a href="{{ route('RestaurantByGenre', $genre->genre_name) }}">
                    <li>
                        <div class="layover">
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
