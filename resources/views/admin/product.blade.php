@extends('adminLayout')

@section('adminContent')

<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold italic">
    <span class="">List Of Products </span>
</div>

@if (session('success'))
<div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
    {{ session('success') }}
</div>
@endif

<hr>
<div class="flex justify-end my-4">
    <a href="{{ route("productform") }}" class="bg-green-500 px-2 py-1 text-white rounded">Add Product</a>
</div>

<!-- Products table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Image</th>
                <th class="py-3 px-6 text-left">Product Name</th>
                <th class="py-3 px-6 text-left">Description</th>
                <th class="py-3 px-6 text-left">Price</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($products as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $product->id }}</td>
                    <td class="py-3 px-6">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-12 h-12">
                    </td>
                    <td class="py-3 px-6">{{ $product->name }}</td>
                    <td class="py-3 px-6">{{ $product->description }}</td>
                    <td class="py-3 px-6">XAF {{ number_format($product->price, 2) }}</td>
                    <td class="py-3 px-6">
                        <a href="{{ route('editproductform', $product->id) }}" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">Edit</a>
                        <form action="" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400  text-white hover:bg-red-700 ml-2 py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


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

    