@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>your cart</h2>


        <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        <?php $total = 0 ?>
    <!-- by this code session get all product that user chose -->
        @if(session('cart'))
            @foreach(session('cart') as $id => $dish)

                <?php $total += $dish['price'] * $dish['quantity'] ?>

                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $dish['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $dish['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $dish['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $dish['price'] * $dish['quantity'] }}</td>
                    <td class="actions" data-th="">
                    <!-- this button is to update card -->
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i>update</button>
                        {{-- <a href="{{ route('update-cart') }}">update</a> --}}
                       <!-- this button is for update card -->
                        <button class="btn btn-danger btn-sm remove" data-id="{{ $id }}" ><i class="fa fa-trash-o"></i>remove</button>
                        {{-- <a href="{{ route('remove') }}">remove</a> --}}
                    </td>
                    
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
       
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
        </tr>
        </tfoot>
    </table>
@endsection

    {{-- @section('content') --}}


    {{-- <script type="text/javascript">
        // this function is for update card
        $("update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "get",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $("remove").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                        
                    }
                });
            }
        });
        </script>
        

@endsection --}}

{{-- @endsection --}}
    
        {{-- {{-- {{-- @foreach ($dish as $item)
            <p>{{ $item->name }}</p>
            
        @endforeach --}}
        {{-- @php $total = 0 @endphp
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
    </div> --}}
