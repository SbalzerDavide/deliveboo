@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Nome Ristorante: {{$user->name}}</h5>
        <div class="rest-name">
            <p>Immagine ristorante :</p>
            <img width="100px" src="{{ asset('storage/' . $user->path_image) }}" alt="{{$user->name}}"> 
        </div>
        
        
        <div class="menu-dashboard">
            <ul>
                <a href="{{ route('admin.restaurants.index') }}">
                    <li>
                        visalizza tutti i piatti
                    </li>
                </a>
                <a href="{{ route('admin.orders') }}">
                    <li>
                        visualizza i tuoi ordini
                    </li>
                </a>
            </ul>
        </div>

        

        {{-- post if I have images --}}
      
 
            
            
            

    </div>

@endsection
