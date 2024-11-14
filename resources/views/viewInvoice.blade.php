<x-app-layout>
    <div class="flex flex-col justify-center items-center">
        <h1 class="font-black text-3xl text-center mt-7 mb-7">INVOICES</h1>
        <div class="flex flex-wrap gap-5 justify-center mt-7">
            @php
                $orderID = [];
            @endphp
            @foreach($invoices as $invoice)
                @if (!in_array($invoice->order_id, $orderID))
                    @php
                        array_push($orderID, $invoice->order_id);
                    @endphp

                    <div class="border-2 border-[#555] rounded-xl bg-[#ccc] p-2 w-72 flex-col flex justify-center items-center">
                        <h4 class="text-xl font-black">Order ID: {{ $invoice['order_id'] }}</h4>
                        
                        <div class="px-2 py-1 w-full flex justify-between items-center gap-3">
                            <a href="{{ route('after.order', ['orderId' => $invoice->order_id]) }}">View Invoice</a>
                            <a href="{{ route('download.invoice', ['orderId' => $invoice->order_id]) }}">Download Invoice</a>
                        </div>
                    </div>
                @endif
            
            @endforeach
        </div>
    </div>
</x-app-layout>