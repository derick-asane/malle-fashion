{{-- @extends('Layout') --}}

{{-- @section('content')
    <p>Hello login page</p>
@endsection --}}

@vite('resources/css/app.css')


<div class="bg-gray-100 flex items-center justify-center py-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Edit Product form</h2>
        
        <form method="POST" action="{{ route('storeproduct')}}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            
            <div>
                <label for="productname" class="block font-medium">Name</label>
                <input id="productname" type="text" name="name" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter product name ...">
            </div>
            
            <div>
                <label for="price" class="block font-medium">Price</label>
                <input id="price" type="number" name="price" required  class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter product price ...">
            </div>

            <div>
                <label for="category" class="block font-medium">Category</label>
                <select name="category" id="" class="border-b border-gray-400 mt-1 block w-full outline-none">
                    <option value="footware">footware</option>
                    <option value="accessories">accessories</option>
                    <option value="clothing">clothing</option>
                    <option value="others">others</option>
                </select>
            </div>

            <div>
                <label for="gender" class="block font-medium">Gender</label>
                <select name="gender" id="gender" class="border-b border-gray-400 mt-1 block w-full outline-none">
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Both">Both</option>
                </select>
            </div>

            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea id="description" type="textarea" name="description" required  class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter Description ..."></textarea>
            </div>

            <div>
                <label for="image" class="block font-medium">Image</label>
                <input id="image" type="file" name="image" required  class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter product price ...">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">submit</button>
        </form>
        
        
    </div>
</div>
