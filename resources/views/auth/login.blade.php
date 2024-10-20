{{-- @extends('Layout') --}}

{{-- @section('content')
    <p>Hello login page</p>
@endsection --}}

@vite('resources/css/app.css')

@if (session('success'))
    <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
        {{ session('success') }}
    </div>
@endif

<div class="bg-gray-100 flex items-center justify-center h-screen">
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
        <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>
        
        <form method="POST" action="{{ route('login')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block font-medium">Email</label>
                <input id="email" type="email" name="email" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Email Address">
            </div>
            
            <div>
                <label for="password" class="block font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Password">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Login</button>
        </form>
        
        <div class="mt-4 text-center">Or</div>
        
        <a href="" class="bg-red-300 hover:bg-red-500 text-white font-semibold py-2 px-4 rounded flex items-center justify-center mt-2 w-full">
            <img src="{{asset('svg/google-log.svg')}}" alt="google logo" class="h-[20px] w-[20px] mr-2" >
             <span>Login with Google</span>
        </a>
        <div class="flex justify-center mt-2">
            <span>Do you have an account ? <a href="{{ route('registerform')}}" class="text-blue-500"> Register</a></span>
        </div>
    </div>
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