@extends('adminLayout')

@section('adminContent')

<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold italic">
    <span class="">List Of Products </span>
</div>
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
                        <a href="{{ route('editproductform') }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

    