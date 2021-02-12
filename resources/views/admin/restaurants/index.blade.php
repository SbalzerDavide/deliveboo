@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>i tuoi piatti</h1>
        @foreach ($dishes as $dish)
            <h2>{{ $dish->name }}</h2>
        @endforeach

        <a href="{{ route('admin.home') }}">torna alla dashboard</a>
       
    </main>

@endsection
