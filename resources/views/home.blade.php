@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @else --}}

        <a href="{{route('Restaurant')}}">
            Ristoranti
        </a>
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
