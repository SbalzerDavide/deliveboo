@extends('layouts.app')

@section('content')
    <div class="payment-page container">
        <h1>pagina pagamento</h1>
        {{-- errors --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
        @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
            </ul>
            </div>
        @endif --}}
        <h2>ordine numero:{{ $order->id }}</h2>

        <form action="{{ route('guest.update', $order->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Insert your name</label>
                <input  class="form-control" type="text" name="name" id="name" value="{{ old('name', $order->name) }}">
            </div>
            <div class="form-group">
                <label for="address">Insert your address</label>
                <input  class="form-control" type="text" name="address" id="address" value="{{ old('address', $order->address) }}">
            </div>
            <div class="form-group">
                <label for="email">Insert your email</label>
                <input  class="form-control" type="text" name="email" id="email" value="{{ old('email', $order->email) }}">
            </div>
            <div class="form-group">
                <label for="phone">Insert your phone number</label>
                <input  class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $order->phone) }}">
            </div>

            <div class="form-group">
                <label for="text">More info about delivery:</label>
                <textarea class="form-control" name="text" id="text" cols="30" rows="5">{{ old('text', $order->text) }}</textarea>
            </div>
            
            
            <input type="submit" class="btn btn-primary" value="Conferma i dati">
            
        </form>
        
        <form id="payment-form" action="{{ route('guest.payment') }}" method="post">
            @csrf
            <label for="amount">
                <span class="input-label">Amount</span>
                <div class="input-wrapper amount-wrapper">
                    {{ $order->price }}$
                </div>
            </label>
    
            {{-- <div id="dropin-container">
            </div> --}}
            <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
            </div>
    
            <input type="submit" />
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </form>
    

    
    </div>

    <script type="text/javascript">
        const form = document.getElementById('payment-form');
        // console.log({{ $clientToken }});

        braintree.dropin.create({
            authorization: "@php echo($clientToken) @endphp",
            // container: document.getElementById('dropin-container'),
            selector: '#bt-dropin',
            paypal: {
                flow: 'vault'
            }

            // ...plus remaining configuration
        }, (error, dropinInstance) => {
            if (error) console.error(error);
            
            form.addEventListener('submit', event => {
                event.preventDefault();
                
                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);
                    
                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                
                });
            });
        });
            
    </script>

@endsection

