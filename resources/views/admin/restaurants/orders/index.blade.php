@extends('layouts.app')

@section('content')
    <main class="container list-orders">
        <h1>Your orders:</h1>


        @if(count($orders) > 0)
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
            <a class="btn btn-primary" href="{{route('admin.chart')}}">
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
