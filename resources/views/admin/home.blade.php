@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Restaurant name: {{$user->name}}</h5>
        <div class="rest-name">
            <p>Your image:</p>
            <img width="100px" src="{{ asset('storage/' . $user->path_image) }}" alt="{{$user->name}}"> 
        </div>
        
        
        <div class="menu-dashboard">
            <ul>
                <a href="{{ route('admin.restaurants.index') }}">
                    <li>
                        Show your dishes
                    </li>
                </a>
                <a href="{{ route('admin.orders') }}">
                    <li>
                        Show your orders
                    </li>
                </a>
            </ul>
        </div>

        

        {{-- post if I have images --}}
      
 
            
            
            

    </div>

@endsection
