@extends('layouts.app')

@section('content')
@if ($user->path_image)

<div class="hero-dashboard" style="background-image: url('../storage/{{$user->path_image}}')">
    <div class="layover">
        <div class="container">
            <h2>{{$user->name}}</h2>
    
        </div>

    </div>

</div>
@else    
    <div class="container">
        <h5>Restaurant name: {{$user->name}}</h5>
        <div class="rest-name">
                <img width="100px" src="{{ asset('image/default_restaurant.png') }}" alt="{{$user->name}}"> 
        </div>
    </div>
@endif
    <div class="container">

        <div class="show-dashboard">
            <div class="box">
                <a href="{{ route('admin.restaurants.index') }}">
                    <h4>Show your dishes</h4>
                </a>
            </div>
            <div class="box">
                <a href="{{ route('admin.orders') }}">
                    <h4>Show your orders</h4>
                </a>
            </div>

        </div>
    </div>

@endsection
