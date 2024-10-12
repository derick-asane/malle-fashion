@extends('Layout')

@section('content')
    <div class="w-full flex justify-center text-[20px] sm:text-[40px] bold italic">
        <span class="">Order Details id:{{$order->id}} </span>
    </div>

    <hr class="py-4">
    <div class="flex gap-4 ml-4">
        <span class="font-extrabold uppercase text-gray-600">Order Status:</span>
        <form action="{{ route('order.updatestatus', ['id' => $order->id ])}}" method="POST">
            @csrf
            
            <select name="status" id="status" disabled>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>DELIVERED</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>CANCELLED</option>
                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>CONFIRMED</option>
            </select>
        </form>
    </div>
    <div class="flex justify-between mx-2 py-4">
        <div class="w-[60%] bg-white rounded-md">
            <!--  cart section we finish, then we move to the payment-->
            <div class="block" id="cartId">
                
                <div class="flex justify-between mx-2 my-2 px-2 font-bold border-2">
                    <span>Image</span>
                    <span>Price</span>
                    <span>Quantity</span>
                    <span>Total</span>
                </div>
                <div class="">
                    @php
                    $total = 0;
                    @endphp
                    @foreach ($order->products as $product )
                        <div class="border mx-2 my-2 relative">

                            <div class=" mx-2 my-2 py-2 flex justify-between items-center">
                                <img src="{{ asset('storage/'.$product->image_path) }}" alt="" class="w-12 h-12">
                                <span>{{number_format($product->price, 2)}}</span>
                                <span>{{$product->pivot->quantity}}</span>
                                <span>XAF{{($product->price *  $product->pivot->quantity)}}</span>
                            </div>   
                        </div>
                        @php
                            $total = $total + ($product->price *  $product->pivot->quantity);
                        @endphp

                    @endforeach
                </div> 
                
            </div>
            
        </div>
        


        <div class="w-[35%] ">
            <div class="w-[100%] bg-white my-3 px-4 border-blue-400 rounded-md border-y-8 border-x-1.5 shadow-2xl">
                <div class="flex justify-center py-2 text-bold">
                    <span class="text-green-500">Order Summary</span>
                </div>
                <hr>
                <div><span>PRICE DETAILS ({{$order->count()}} {{$order->count() > 1 ? "Items" : "Item" }})</span></div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-400">Total MRP</span>
                    <span>XAF 3000</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-400">Discout on MRP</span>
                    <span>XAF 3000</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-400">Shipping Fee</span>
                    <span>XAF Free</span>
                </div>
                <hr>
                <div class="flex justify-between mt-4 py-2">
                    <span class="text-green-500 text-[20px]">Total Amount</span>
                    <span class="text-green-500 text-[20px]">XAF {{number_format($total, 2)}}</span>
                </div>  
    
            </div>    
        </div>
    </div>

    <script>
        document.getElementById('status').addEventListener('change', function() {
            this.form.submit();
        });

        
    </script>
@endsection