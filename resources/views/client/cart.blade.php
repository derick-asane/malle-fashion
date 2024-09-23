@extends('Layout')

@section('content')
    <div class="bg-gray-100">
        <div class="flex justify-center py-4 uppercase">
            <h1>header</h1>
        </div>

        <div class="flex justify-between mx-2 py-4">
            <div class="w-[60%] bg-white rounded-md">
                <div class="flex justify-between px-4 py-4">
                    <div>Shopping</div>
                    <span>{{$cartItems->count()}} {{$cartItems->count() > 1 ? "Items" : "Item" }}</span>
                </div>
                <hr>
                <div class="flex justify-between mx-2 my-2 px-2">
                    <span>Image</span>
                    <span>Price</span>
                    <span>Quantity</span>
                    <span>Total</span>
                </div>
                <div class="">
                    @foreach ($cartItems as $cartItem )
                        <div class="border mx-2 my-2 relative">
                            
                            <div class="absolute top-0 right-0 mr-3 text-red-600">
                                <form action="{{ route('delete.cart', $cartItem->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">X</button>
                                  </form>
                            </div>

                            <div class=" mx-2 my-2 py-2 flex justify-between items-center">
                                <img src="{{ asset('storage/'.$cartItem->product->image_path) }}" alt="" class="w-12 h-12">
                                <span>{{$cartItem->product->price}}</span>
                                <form action="{{}}" method="post" class="flex justify-center w-[10%]">
                                    @csrf
                                    <input type="number" id="quantityInput" value="{{$cartItem->quantity}}" min="1" class="border rounded w-[70%]" onchange="this.form.submit()">
                                </form>
                                <span>1000</span>
                            </div>   
                        </div>
                        
                    @endforeach
                </div>
            </div>
            <div class="w-[35%] bg-blue-900 rounded-md">
                <div class="w-[100%] bg-white my-3 px-4">
                    <div class="flex justify-center py-2 text-bold">
                        <span class="text-green-500">Order Summary</span>
                    </div>
                    <hr>
                    <div><span>PRICE DETAILS ({{$cartItems->count()}} {{$cartItems->count() > 1 ? "Items" : "Item" }})</span></div>
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
                        <span >Total Amount</span>
                        <span>XAF 5000</span>
                    </div>
                    <div>
                        <button type="submit" class="w-[100%] bg-blue-900 rounded py-2 text-white mb-4">PLACE ORDER</button>
                    </div>
        
                </div>    
            </div>
        </div>
    </div>



    <script>
        document.getElementById('quantityInput').addEventListener('change', function() {
            this.form.submit();
        });
    </script>
@endsection