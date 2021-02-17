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
    @forelse ($user->genres as $genre)
            <span class="badge badge-dark">{{ $genre->name }}</span>
            @empty
                <h5>No actual tag for this post.</h5>
    @endforelse

  </div>
@endsection
