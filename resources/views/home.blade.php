@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('Restaurant')}}">
            Ristoranti
        </a>
        <ul>
            @foreach ($genres as $genre)
                <li>
                    <a href="{{ route('RestaurantByGenre', $genre->genre_name) }}">{{ $genre->genre_name }}</a>
                </li>
            @endforeach
        </ul>
        <h1>ciao</h1>
    </div>
@endsection
