<x-app-layout>
<div class="px-6">
    <h2 class="text-2xl my-4 font-bold">{{ $product['name'] }}</h2>
    <div class="flex gap-8">
            <img class="w-72" src="{{ asset('/storage/products/'.$product->image) }}" alt="{{ $product->name }} Photo">
        <div>
            <h6>Category: {{ $product->category->name }}</h6>
            <div>
                <h6>{{ 'Rp ' . number_format($product['price'], 2, ',', '.') }}</h6>
                @if($product->amount > 0)
                    <h6>Stock: {{ number_format($product['amount'], 0, '.', '.') }}</h6>
                @else
                    <h6>Stock: Sold Out</h6>
                @endif
            </div>

            @if (\Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif

            @if (!Auth::user()->is_admin)
                <form action="{{ route('Add.to.cart', $product->id) }}" method="POST">
                    @csrf
                    @if($product->amount > 0)
                        <input type="number" value="{{ $product->amount >= 1 ? 1 : $product->amount }}" min="1" max="{{ $product->amount }}" class="form-control" style="width:100px" name="amount">
                        <br>
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <p class="btn-holder">
                            <button type="submit" class="bg-[#1f4c99] text-white px-3 py-1 my-1 rounded-lg">Add to Cart</button>
                        </p>
                    @endif
                </form>
            @endif


            <div class="d-flex justify-content-between align-items-center" style="width: 40%">
                <a href="/dashboard" class="bg-[#202020] text-white px-3 py-1 my-1 rounded-lg">Back</a>
                @if (Auth::user()->is_admin)
                <form action="{{route('delete.product')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger btn- bg-[#710000] text-white px-3 py-1 mt-1 rounded-lg" >Delete</button>
                </form>
                <a href="/edit-product/{{ $product->id}}"><button type="button" class="btn btn-warning bg-[#000747] text-white px-3 py-1 mt-1 rounded-lg">Edit</button></a>
                @endif
            </div>
        </div>
    </div>
</div>


</x-app-layout>
