@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>your cart</h2>
    
        {{-- @foreach ($dish as $item)
            <p>{{ $item->name }}</p>
            
        @endforeach --}}
        @php $total = 0 @endphp
        @if(session('cart'))
        <ul>
            @foreach (session('cart') as $id => $dish)
                @php
                    $sub_total = $dish['price'] * $dish['quantity'];
                    $total += $sub_total;
                @endphp
                <li>
                    {{ $dish['name'] }}
                </li>
                <li>
                    {{ $dish['price'] }}
                </li>
                <li>
                    {{ $dish['quantity'] }}
                </li>
                <li>
                    {{ $sub_total}}
                </li>
                <li>
                    <a href="{{ route('remove', [$id]) }}">
                        <div class="btn btn-primary">
                            remove
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>            
        @endif
        <a href="">
            <button class="btn btn-primay">
                continue to shopping
            </button>
        </a>
        <p>total: {{ $total }}</p>
    </div>

@endsection