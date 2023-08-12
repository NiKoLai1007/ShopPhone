<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Mail</title>
</head>

<body>
    <h1>Your Order ID: {{ $order->id }}</h1>
    <h1>Your Order has been processed and is ready for Delivery</h1>
    <h1>Total</h1>
    <h1>
        @php
            $overallTotal = 0;
            foreach ($order as $order) {
                // Check if the 'price' property exists in the current order object
                if (isset($order->price)) {
                    $subtotal = $order->price * $order->quantity;
                    $overallTotal += $subtotal;
                }
            }
            echo $overallTotal;
        @endphp
    </h1>
</body>

</html>
