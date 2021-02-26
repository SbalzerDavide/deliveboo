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
            
            @endforeach
        </table>

        <a href="{{route('admin.chart')}}">
            Vedi tabella
        </a>
            
    </main>

@endsection
