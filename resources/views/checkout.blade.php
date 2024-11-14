<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <h1 class="ms-3 my-3">Checkout</h1>
    <div class="row">
        <div class="col-md-4 ms-4 rounded-4 border border-white border-3">
            <br>
            <h3 class="m-0">User Details</h2>
            @auth
            <br>
                <p>Name: {{ Auth::user()->name }}</p>
                <p>Email Id: {{ Auth::user()->email }}</p>
                <p>Phone: {{ Auth::user()->phonenum }}</p>
                <p>Address: {{ Auth::user()->address }}</p>
                <p>Postal Code: {{ Auth::user()->postalcode }}</p>
            @endauth
            <br>
            <h2>Order Information</h2>
            <br>
            <p>Order ID: #{{$orderID}}</p>
            <p>Payment Mode: Cash On Delivery</p>
        </div>
        <div class="col-md-6 ms-5">
            <br>
            <h2 class="my-3">Order Summary</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-4">Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($cart as $details)
                        <tr>
                            <td>{{ $details->product->name }}</td>
                            <td>Rp {{ $details->product->price }}</td>
                            <td>{{ $details->quantity }}</td>
                            <td>Rp {{ number_format(($details->product->price * $details->quantity), 2) }}</td>
                        </tr>
                        @php
                            $totalPrice += $details->product->price * $details->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right"><strong>Grand Total:</strong></td>
                        <td>Rp {{ number_format($totalPrice, 2) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-3">
                <a href="{{ route('place.order', ['orderId' => $orderID]) }}" class="btn btn-info btn-lg">Place Order</a>
            <div class="col-md-6">
        </div>
    
        </div>
    </div>

</body>    
</html>
