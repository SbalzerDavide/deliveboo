<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>

        {{-- fonts --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;900&display=swap" rel="stylesheet">    

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


      </head>
      <body>
        @include('partials.header')
        
            <main class="py-4">
                @yield('content')
            </main>

        @include('partials.footer')

      
        <script type="text/javascript">

            const form = document.getElementById('payment-form');
            const clientToken = '@php echo($clientToken) @endphp';
            console.log(clientToken);
            braintree.dropin.create({
                authorization: clientToken,
                container: document.getElementById('dropin-container'),
            }, (error, dropinInstance) => {

                if (error) console.error(error);

                form.addEventListener('submit', event => {
                    event.preventDefault();

                    dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) {
                        console.error(error);
                    }
                    document.getElementById('nonce').value = payload.nonce;

                    form.submit();
                    });
                });
            });
        </script>
      </body>
</html>




