<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Placed!</title>
</head>
<body style="background-color: black; width: 100vw; height:100vh; margin:0; padding:0; display: flex; flex-direction: column; justify-content: center; align items: center;">
    
    <div style="text-align: center;">
        <h2 style="font-size: 28px; font-weight: bold; color: white;">Thank You for Shopping with Us!!!</h2>
    
        <div class="mt-5">
            <a href="{{ route('after.order', ['orderId' => $orderId]) }}" style="margin-right: 20px; background-color: #7fff87; color: black; padding-left:8px; padding-right:8px; padding-top:5px; padding-bottom:5px; font-weight:600; text-decoration: none;">View Invoice</a>
            <a href="{{ route('download.invoice', ['orderId' => $orderId]) }}" style="margin-right: 20px; background-color: rgb(121, 192, 255); color: black; padding-left:8px; padding-right:8px; padding-top:5px; padding-bottom:5px; font-weight:600; text-decoration: none;">Download Invoice</a>
            <a href="{{ route('dashboard') }}" style="margin-right: 20px; background-color: #dbdbdb; color: black; padding-left:8px; padding-right:8px; padding-top:5px; padding-bottom:5px; font-weight:600; text-decoration: none;">Back</a>
        </div>
        </div>
    </div>
</body>
</html>



