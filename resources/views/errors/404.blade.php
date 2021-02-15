@extends('layouts.app')

@section('content')
    <main class="container">
       <h1>
           Oooop something gone wrong :(
       </h1>
       <a class="btn btn-primary" href="{{route('admin.restaurants.index')}}">
            Torna ai piatti
        </a>
    </main>

   

@endsection
