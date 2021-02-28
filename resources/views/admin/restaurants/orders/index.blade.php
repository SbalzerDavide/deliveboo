@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>I tuoi ordini</h1>
        <table class="table table-hover table-condensed">

            @foreach ($orders as $order)
            <tbody>
                <a href="#">
                    <tr>
                        <td>
                            <h5>order id: {{ $order->id }}</h5>
                        </td>
                        <td>
                            price: {{ $order->price }}
                        </td>
                    </tr>
                </a>
            </tbody>
            {{-- <h1>{{ $order->dish->name }}</h1> --}}
            {{-- @foreach ($order->dishes as $dish)
                {{$dish->id}}
            @endforeach --}}
            
            @endforeach
            
            
        </table>
        {{-- <h5>{{ $user->name }}</h5> --}}


        <a href="{{route('admin.chart')}}">
            Vedi tabella
        </a>
            
    </main>

@endsection
