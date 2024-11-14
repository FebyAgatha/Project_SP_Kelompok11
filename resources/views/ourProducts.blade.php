<x-app-layout>
    <div class="bg-black">
        <h2 class="font-bold text-5xl text-center p-6 pt-12 text-white bg-transparent">
                Our Products
        </h2>
        <p class="bg-black text-lg text-center pb-8 text-white">
            A wide variety of books from every nation in the world!
        </p>


        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-welcome />
                </div>
            </div>
        </div> --}}

        <div class="container mx-auto pt-3 px-10 bg-transparent text-white">
            <div class="flex flex-wrap gap-14 justify-center">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card bg-[#222] p-6 flex flex-col justify-center rounded-2xl border-2 border-white" style="width: 18rem;">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="card-img-top rounded-lg" alt="{{ $product->name }} Photo">
                        <div class="card-body flex flex-col gap-1 mt-5">
                            <h5 class="card-title font-extrabold text-xl">{{ $product['name'] }}</h5>
                            <p class="text-gray-400">Price: {{ 'Rp ' . number_format($product['price'],2,',','.') }}</p>
                            @if($product->amount > 0)
                                <p class="text-gray-400">Stock: {{ number_format($product['amount'], 0, '.', '.') }}</p>
                            @else
                                <p class="text-gray-400">Stock: Sold Out</p>
                            @endif
                            <a href="/display-product/{{$product->id}}" class="border-gray-400 border-2 hover:border-white rounded-lg font-semibold mt-2 px-5 py-2 text-center"><i class="fas fa-link"></i> See Detail </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

