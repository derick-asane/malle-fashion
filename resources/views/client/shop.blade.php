@extends('Layout')


@section('content')
        <div class="w-full flex justify-center text-[40px] bold mb-4">
            <span>Shop now, {{Auth::User()->username}} </span>
        </div>
        <hr>
        <div class="w-full flex justify-between items-center px-4">
            <span>Showing result: 10</span>
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
   
@endsection