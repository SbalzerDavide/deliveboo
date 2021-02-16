@extends('layouts.app')

@section('content')

  <div class="container">
    <a href="{{route('Restaurant', '')}}">
      Ristoranti
    </a>

    <ul>
      @foreach ($genres as $genre)
        <li>
          <a href="{{ route('Restaurant', $genre->name) }}">{{ $genre->name }}</a>
          
        </li>
      @endforeach
    </ul>

  </div>
@endsection
