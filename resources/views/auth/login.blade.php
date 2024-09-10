{{-- @extends('Layout') --}}

{{-- @section('content')
    <p>Hello login page</p>
@endsection --}}

@vite('resources/css/app.css')


<div class="bg-gray-100 flex items-center justify-center h-screen">

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
            <span>Do you have an account ? <a href="{{ route('register')}}" class="text-blue-500"> Register</a></span>
        </div>
    </div>
</div>
