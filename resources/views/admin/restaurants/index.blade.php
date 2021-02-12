@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>i tuoi piatti</h1>
        <a class="btn btn-success" href="{{route('admin.restaurants.create')}}">Create a new Dish</a>
        @foreach ($dishes as $dish)       
            <div>
              <h2>{{ $dish->name }}</h2>
              <a class="btn btn-primary" href="#">Edit</a>
              <a class="btn btn-danger" href="#">Delete</a>
            </div>
        @endforeach

        <a href="{{ route('admin.home') }}">torna alla dashboard</a>
        <div class="container">
        
    </div>
    </main>

   

@endsection
