@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>dashboard</h1>

        <a href="{{ route('admin.restaurants.index') }}">visalizza tutti i piatti</a>
        <a href="{{ route('admin.orders') }}">visalizza tutti gli ordini</a>

        {{-- post if I have images --}}
      
 
             <img width="500px" src="{{ asset('storage/' . $user->path_image) }}" alt="{{ $user->name }}"> 

            {{$user->name}}

    </div>

@endsection
