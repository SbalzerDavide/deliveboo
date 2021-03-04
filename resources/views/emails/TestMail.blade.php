<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="mail-hero">
        <img src="{{ asset('image/top_bg.png') }}" alt="hero">
    </div>
    <p>Thanks for choosing us, your order has been placed</p>

    <h2>order details:</h2>

    <ul>
        <li>your name: {{ $order->name }}</li>
        <li>your address: {{ $order->address }}</li>
        <li>your phone: {{ $order->phone }}</li>
    </ul>
</body>
</html>

