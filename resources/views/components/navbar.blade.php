

<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="#" class="text-white text-xl font-bold">malle fashion</a>
            </div>
            

            <div class="hidden md:flex md:items-center md:space-x-8 ml-6">
                <a href="#" class="text-white">Home</a>
                <a href="#" class="text-white">About</a>
                <a href="#" class="text-white">Services</a>
                <a href="#" class="text-white">Contact</a>
            </div>
      

        <div class="md:flex md:items-center md:space-x-4">
            <a href="{{ route('login') }}" class="text-white">Login</a>
            <a href="{{ route('register')}}"
                class="text-white bg-blue-500 px-4 py-2 rounded-md">Register</a>
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-button"
                class="text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden md:hidden bg-gray-800">
        <a href="#" class="block text-white py-2 px-4">Home</a>
        <a href="#" class="block text-white py-2 px-4">About</a>
        <a href="#" class="block text-white py-2 px-4">Services</a>
        <a href="#" class="block text-white py-2 px-4">Contact</a>
    </div>
</nav>

