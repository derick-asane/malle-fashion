@extends('Layout')

@section('content')
    <div class="bg-gray-100">

        @if (session('error'))
            <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-center py-4 uppercase">
            <h1>cart --------> payment</h1>
        </div>

        <div class="flex justify-between mx-2 py-4">
            <div class="w-[60%] bg-white rounded-md">
                <!--  cart section we finish, then we move to the payment-->
                <div class="block" id="cartId">
                    <div class="flex justify-between px-4 py-4">
                        <div>Shopping</div>
                        <span>{{$cartItems->count()}} {{$cartItems->count() > 1 ? "Items" : "Item" }}</span>
                    </div>
                    <hr>
                    <div class="flex justify-between mx-2 my-2 px-2 font-bold">
                        <span>Image</span>
                        <span>Price</span>
                        <span>Quantity</span>
                        <span>Total</span>
                    </div>
                    <div class="">
                        @php
                        $total = 0;
                        @endphp
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
                                    <form action="{{ route('update.quantity' , $cartItem->id) }}" method="POST" class="flex justify-center w-[10%]">
                                        @csrf
                                        <input type="number" name="quantity" id="quantityInput" value="{{$cartItem->quantity}}" min="1" class="border rounded w-[70%]" onchange="this.form.submit()">
                                    </form>
                                    <span>XAF{{($cartItem->product->price *  $cartItem->quantity)}}</span>
                                </div>   
                            </div>
                            @php
                                $total = $total + ($cartItem->product->price *  $cartItem->quantity);
                            @endphp

                        @endforeach
                    </div>
                
                    <div class="flex justify-end items-center pr-4 py-2 text-blue-400" onclick="showCart()">
                        <a href="#" id="showPayment">Move to payment</a>
                        <img src=" {{asset('svg/right-arrow.svg') }} " alt="arrow" class="w-8 h-8">  
                    </div>
                   
                </div>
                <!--  cart section we now make the payment here -->
                <div class="hidden" id="paymentId">
                    <div class="flex justify-center pb-1">
                        <span class="text-[30px] text-green-600">Make payment</span>
                    </div>
                    <hr>
                    <form action="" class="p-2">
                        @csrf

                        <div>
                            <div class="flex justify-start gap-2 items-center">
                                <img src=" {{asset('svg/shipping-icon.svg')}}" alt="arrow" class="w-8 h-8">   
                                <span class="font-bold">Shipping Address</span>
                            </div>
                            <div class="flex  items-center justify-around mb-4">
                                <div class="w-[40%]">
                                    <label for="productname" class="block font-medium">City</label>
                                    <input id="productname" type="text" name="name" required autofocus class="form-input border border-gray-400 mt-1 block w-full outline-none rounded" placeholder="Enter your city ...">
                                </div>
                                <div class="w-[40%]">
                                    <label for="productname" class="block font-medium">Quater</label>
                                    <input id="productname" type="text" name="name" required autofocus class="form-input border border-gray-400 mt-1 block w-full outline-none rounded" placeholder="Enter your quater ...">
                                </div>
                            </div>

                            <div class="flex  items-center justify-around mb-4">
                                <div class="w-[40%]">
                                    <label for="productname" class="block font-medium">Adress</label>
                                    <input id="productname" type="text" name="name" required autofocus class="form-input border border-gray-400 mt-1 block w-full outline-none rounded" placeholder="Enter your address ...">
                                </div>
                                <div class="w-[40%]">
                                    <label for="productname" class="block font-medium">Phone</label>
                                    <input id="productname" type="text" name="name" required autofocus class="form-input border border-gray-400 mt-1 block w-full outline-none rounded" placeholder="Enter your tel ...">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-start gap-2 items-center">
                                <img src=" {{asset('svg/payment-icon.svg')}}" alt="arrow" class="w-8 h-8">   
                                <span class="font-bold">Payment Info</span>
                            </div>
                            <div>
                                
                                <div class="flex  items-center justify-around mb-4">
                                    <div class="w-[40%]">
                                        <label for="category" class="block font-medium">Payment method</label>
                                        <select name="payment_method" id="" class="border-b border-gray-400 mt-1 block w-full outline-none">
                                            <option value="momo">MOMO</option>
                                            <option value="om">OM</option>
                                            <option value="others">others</option>
                                        </select>
                                    </div>
                                    <div class="w-[40%]">
                                        <label for="productname" class="block font-medium">Mobile Number</label>
                                        <input id="productname" type="number" name="mobile_number" required autofocus class="border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter your mobile money number ...">
                                    </div>
                                </div>
    
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-blue-400 rounded w-[100%] my-2 text-white text-[30px] hover:bg-blue-600">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr>
                    <div class="flex justify-center gap-8 py-4 mt-4">
                        <img src=" {{asset('images/mtn-orange.png')}}" alt="arrow" class="w-15 h-10">
                        <img src=" {{asset('svg/paypal.svg')}}" alt="arrow" class="w-12 h-12">
                        <img src=" {{asset('svg/mastercard.svg')}}" alt="arrow" class="w-12 h-12">
                        <img src=" {{asset('svg/google-pay.svg')}}" alt="arrow" class="w-12 h-12">
                        <img src=" {{asset('svg/visa.svg')}}" alt="arrow" class="w-12 h-12">   
                    </div>
                    <div class="flex  items-center text-blue-400 pl-4 py-4">
                        <img src=" {{asset('svg/left-arrow.svg')}}" alt="arrow" class="w-8 h-8">   
                        <a href="#" id="showCart">Back to cart</a>
                    </div>
                </div>
            </div>
            







            <div class="w-[35%] bg-blue-400 rounded-md">
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
                        <span class="text-green-500 text-[20px]">Total Amount</span>
                        <span class="text-green-500 text-[20px]">XAF {{$total}}</span>
                    </div>
                    
        
                </div>    
            </div>
        </div>

        <a href="{{ route('client.shop')}}" class="pb-4 pl-4 flex items-center gap-2">
            <img src=" {{asset('svg/arrow-left-icon.svg')}}" alt="arrow" class="w-6 h-6">
            <span class="text-green-400">Continue Shopping</span>
        </a>
    </div>



    <script>
        document.getElementById('quantityInput').addEventListener('change', function() {
            this.form.submit();
        });

        document.addEventListener('DOMContentLoaded', function() {
        const showCartLink = document.getElementById('showCart');
        const showPaymentLink = document.getElementById('showPayment');
        const cartDiv = document.getElementById('cartId');
        const paymentDiv = document.getElementById('paymentId');

        showCartLink.addEventListener('click', function() {
            cartDiv.classList.remove('hidden');
            paymentDiv.classList.add('hidden');
        });

        showPaymentLink.addEventListener('click', function() {
            cartDiv.classList.add('hidden');
            paymentDiv.classList.remove('hidden');
        });
    });

    </script>
@endsection