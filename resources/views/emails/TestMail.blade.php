@extends('layouts.email')

@section('content')
<style>
    .container{
       margin-left: 30px;
       font-family: sans-serif;
    }
</style>
   <main class="container">
        <a href="{{route('homepage')}}">
            <img height="70" src="{{asset('image/sfondo-bianco.png')}}" alt="logo">
        </a>
        
        <p> Hi, {{ $order->name }}! Thanks for choosing us, your order has been placed</p>

        <h2>order details:</h2>

        <p>Your order will be delivered in {{ $order->address }}, as soon as possible.</p>
   </main>
@endsection
   
    

