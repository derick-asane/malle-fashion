@extends('Layout')


@section('content')
    <div class="bg-gray-50">
        <div class="w-full flex justify-center text-[40px] bold mb-4">
            <span>Shop now, {{Auth::User()->username}} </span>
        </div>

        @if (session('success'))
            <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
                {{ session('success') }}
            </div>
        @endif

        @if (session('OrderSuccess'))
            <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
                {{ session('OrderSuccess') }}
            </div>
        @endif

        @if (session('error'))
            <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
                {{ session('error') }}
            </div>
        @endif

        @if (session('warn'))
        <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-yellow-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
            {{ session('warn') }}
        </div>
        @endif

        <hr>
        <div class="w-full flex justify-between items-center px-4">
            <span>Showing result: {{ $products instanceof Illuminate\Database\Eloquent\Collection ? $products->count() : 0 }}</span>
            <div>
                <form action="{{ route('client.shop') }}" method="GET">
                    <select name="sort_by" onchange="this.form.submit() ; updateFormAndStorage(this);" id="sortSelect">
                        <option value="all">All</option>
                        <option value="popularity">Popularity</option>
                        <option value="latest">Latest</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                    </select>
                </form>
            </div>
        </div>
        <section class="container mx-auto py-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center uppercase">Featured Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mx-auto">
                @foreach($products as $product)
                    <div class="bg-white shadow-md rounded-lg px-1 py-4">
                        <div class="h-64 mb-4">
                            <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" class="object-cover w-full h-full rounded-lg">
                        </div>
                        <div class="mx-4">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold mb-2">{{$product->name}}</h3>
                                <img src="{{ asset('svg/heart-fill-icon.svg') }}" alt="" class="h-6 w-6">
                            </div>
                            <p class="text-gray-600 mb-4">{{ Str::limit($product->description, 30) }}</p>
                            <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-gray-800">XAF{{number_format($product->price, 2)}}</span>

                            <form id="addToCartForm" action="{{ route('store.addtocart', $product->id ) }}" method="POST" >
                                @csrf
                                <button type="submit" class="bg-gray-100 px-3 py-2 border rounded-xl">add Cart</button>
                            </form>
                            
                        </div>
                        </div> 
                    </div>
                @endforeach
            </div>
          
        </section>
    </div>
        <script>
            
            function updateFormAction(selectElement) {
                var selectedValue = selectElement.value;
                var form = document.getElementById('sortForm');
                
                // Update the form action URL based on the selected value
                form.action = "{{ route('client.shop') }}" + "?sort_by=" + selectedValue;

                // Store the selected value in local storage
                localStorage.setItem('selectedOption', selectedValue);

                // Submit the form
                form.submit();
            }

            document.getElementById('sortForm').onchange = function() {
                this.submit();
            };

            // Set the selected option based on the stored value in local storage
            window.onload = function() {
                var selectedOption = localStorage.getItem('selectedOption');
                if (selectedOption) {
                    document.getElementById('sortSelect').value = selectedOption;
                }
            };
        </script>  
        
        <script>
            // Display the alert with animation
            const alert = document.getElementById('alert');
            if (alert) {
                alert.classList.remove('translate-y-[-100%]'); // Remove the initial translate class
                alert.classList.add('translate-y-0'); // Bring it to the normal position
        
                // Set a timeout to hide the alert after 3 seconds with animation
                setTimeout(function() {
                    alert.classList.add('translate-y-[-100%]'); // Move it up
                    // Optionally, hide the element completely after the animation
                    setTimeout(() => {
                        alert.style.display = 'none'; // Hide the alert completely after animation is done
                    }, 500); // Match this with the duration of the transition
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        </script>
   
@endsection