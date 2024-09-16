
@extends('Layout')

@section('content')

<section class="bg-gray-100 p-6 md:flex items-center">
    <div class="md:w-1/2 md:pr-8">
        <img src="{{ asset('images/shoe1.png') }}" alt="Fashion Image" class="w-full rounded-lg">
    </div>

    <div class="md:w-1/2">
        <h2 class="text-3xl mb-4 font-bold">Welcome to Our E-Commerce Store</h2>
        <h3 class="text-xl font-semibold mb-2">About Our Fashion Collection</h3>
        <p class="text-lg text-gray-700">Explore the latest trends in fashion and discover your style with our curated collection of clothing, accessories, and more. Shop now to elevate your wardrobe!</p>
    </div>
</section>



<!-- Featured Products Section -->
<section class="container mx-auto py-16">
    <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center uppercase">Featured Products</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mx-auto">
        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/shoe4.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Shoe</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
                <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800">$99.99</span>
                <a href="#" class="bg-gray-100 px-3 py-2 border rounded-xl">add Cart</a>
            </div>
            </div> 
        </div>
        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/trouser.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Trouser</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
                <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800">$99.99</span>
                <a href="#" class="bg-gray-100 px-3 py-2 border rounded-xl">add Cart</a>
            </div>
            </div> 
        </div>

        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/necklace.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Necklace</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
                <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800">$99.99</span>
                <a href="#" class="bg-gray-100 px-3 py-2 border rounded-xl">add Cart</a>
            </div>
            </div> 
        </div>

         <!-- Example product card -->
         <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/women-skirt.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Necklace</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
                <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800">$99.99</span>
                <a href="#" class="bg-gray-100 px-3 py-2 border rounded-xl">add Cart</a>
            </div>
            </div> 
        </div>
    </div>
  
</section>

<section class="bg-gray-200 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Trendy Fashion for You</h1>
        <p class="text-lg text-gray-600 mb-8">Discover the latest trends and styles in fashion</p>
        <a href="#" class="bg-black text-white px-6 py-3 rounded-lg inline-block">Shop Now</a>
    </div>
</section>

<!-- Contact Form Section -->

@endsection



