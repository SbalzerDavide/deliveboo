@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>dashboard</h1>

        <a href="{{ route('admin.restaurants.index') }}">visalizza tutti i piatti</a>
        <a href="{{ route('admin.orders') }}">visalizza tutti gli ordini</a>

        <img width= 200 src="{{ $user->path_image }}" alt="">
    </div>

@endsection
