@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>i tuoi piatti</h1>

        @if (session('dish-deleted'))
            <div class="alert alert-danger">
                Dish "{{session('dish-deleted')}}" has been deleted
            </div>
        @endif

        <a class="btn btn-success" href="{{route('admin.restaurants.create')}}">Create a new Dish</a>
        
        @foreach ($dishes as $dish)       
            <div>
                <h2>{{ $dish->name }}</h2>
                <a class="btn btn-success" href="{{route('admin.restaurants.show', $dish->slug)}}">Vedi piatto</a>
                <a class="btn btn-primary" href="{{route('admin.restaurants.edit', $dish->slug)}}">Edit</a>

                <form action="{{route('admin.restaurants.destroy', $dish->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </div>
        @endforeach

        <a href="{{ route('admin.home') }}">torna alla dashboard</a>
        
    </main>

   

@endsection
