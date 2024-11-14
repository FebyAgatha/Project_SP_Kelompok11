<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

</body>
</html>

<x-app-layout>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th class="px-6 py-3 col-3 text-center">
                Product name
            </th>
            <th class="px-6 py-3 text-center">
                Category
            </th>
            <th class="px-6 py-3 text-center">
                Price
            </th>
            <th class="px-6 py-3 text-center">
                Amount
            </th>
            <th class="px-6 py-3 col-3 text-center">
                Image
            </th>
            <th class="px-6 py-3 text-center">
                Total
            </th>
            <th class="px-6 py-3 text-center">
                Delete
            </th>

        </tr>
    </thead>
    <tbody>
        @php
            $totalPrice = 0;
        @endphp
        @foreach ($cart as $cartItem)
        <tr rowId="{{ $cartItem->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-wrap">
                {{ $cartItem->product->name }}
            </th>
            <td class="px-6 py-4 text-center">
                {{ $cartItem->product->category->name }}
            </td>
            <td class="px-6 py-4 text-center">
                Rp {{ number_format($cartItem->product->price, 2, ',', '.') }}
            </td>
            <td class="px-6 py-4 text-center">
                {{ $cartItem->quantity }}
            </td>
            <td class="px-6 py-4">
                <img src="{{ asset('/storage/products/'.$cartItem->product->image) }}" alt="" height="10%" width="20%">
            </td>
            @php
                $subtotal = $cartItem->product->price * $cartItem->quantity;
                $totalPrice += $subtotal;
            @endphp
            <td class="px-6 py-4 text-center">
                Rp {{ number_format($subtotal, 2, ',', '.') }}
            </td>
            <td class="actions">
                <form action="{{route('delete.cart.product')}}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $cartItem->id }}">
                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @if($totalPrice > 0)
            <tr rowId="{{ $cartItem->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td colspan="4"></td>
                <td colspan="1" class="text-right">Grand Total:</td>
                <td class="text-center" colspan="2">Rp {{ number_format($totalPrice, 2, ',', '.') }}</td>
            </tr>
            <tr rowId="{{ $cartItem->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td colspan="7" class="text-right">
                    <a href="{{ route('check.out') }}" class="btn btn-primary">Checkout</a>
                </td>
            </tr> 
        @else
            <tr>
                Add Something!!
            </tr>
        @endif  
    </tbody>
  </table>

</x-app-layout>
