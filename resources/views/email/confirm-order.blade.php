<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Mail</title>
</head>

<body>
    <h1>{{ $order->id }}</h1>
    <h1>This order has been confirmed!</h1>
    <h1>{{ $order->created_at }}</h1>
    <h1>{{ $order->updated_at }}</h1>
</body>

</html>
