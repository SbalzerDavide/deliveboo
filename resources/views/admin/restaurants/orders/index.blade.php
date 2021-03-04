@extends('layouts.app')

@section('content')
    <main class="container list-orders">
        <h1>Your orders:</h1>


        @if(!$orders)
            <table class="table table-hover table-condensed">
                @foreach ($orders as $order)
                <h1>ci sono ordini</h1>
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
        @else
            <p>You don't have yet orders</p>
        @endif

        <a class="compra-inverso search-advanced-inverso" href="{{route('admin.home')}}">
            <i class="fa fa-angle-left"></i>
            <span>back to dashboard</span>
            
        </a>

            
        {{-- <h5>{{ $user->name }}</h5> --}}


            
    </main>

@endsection
