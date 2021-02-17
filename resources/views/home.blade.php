@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{route('RestaurantByGenre', '')}}">
            Ristoranti
        </a>
        <ul>
            @foreach ($genres as $genre)
                <li>
                    <a href="{{ route('RestaurantByGenre', $genre->genre_name) }}">{{ $genre->genre_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
