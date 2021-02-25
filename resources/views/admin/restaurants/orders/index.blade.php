@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>ordini</h1>
        <ul>
            @foreach ($orders as $order)
            <li>
                <h5>order id: {{ $order->id }}</h5>
                price: {{ $order->price }}
            </li>
                
            @endforeach
            
        </ul>
    </main>

@endsection
