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
                <li>
                    {{ $dish['name'] }}
                </li>
                <li>
                    {{ $dish['price'] }}
                </li>
                <li>
                    {{ $dish['quantity'] }}
                </li>
            @endforeach
        </ul>            
        @endif
    </div>

@endsection