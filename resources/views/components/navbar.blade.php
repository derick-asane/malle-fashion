

<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="#" class="text-white text-xl font-bold italic">Malle fashion</a>
            </div>
            

            <div class="hidden md:flex md:items-center md:space-x-8 ml-6">
                <a href="{{ route('client.home')}}" class="text-white">Home</a>
                <a href="{{ route('client.shop')}}" class="text-white">Shop</a>
                <a href="{{ route('client.orders')}}" class="text-white">MyOrders</a>
                <a href="{{ route('favorite.product')}}" class="text-white">Favorite</a>
            </div>
            
            <div class="flex justify-end items-center">
                
                
                @if(Auth::check()) 
                
                    <div class="relative" >
                        <a href="{{ route('client.cart') }}"><img src="{{ asset('svg/shopping-cart-logo1.svg')}}" alt="cart" class="h-10 w-10  mx-4 "></a>
                        <span class="absolute p-1 bg-slate-400 rounded-full top-0 ">
                            5 
                        </span>
                    </div>
                    <div class="avatar" data-toggle="modal" data-target="#userModal">
                        <!-- Display the user's avatar image here -->
                        <img src="{{ asset('images/shoe4.png') }}" alt="User Avatar" class="rounded-full h-10 w-10 border border-red-400">
                        
                    </div>

                    <div class="modal fixed w-full top-16 right-5 flex justify-end hidden" id="userModal">
                        
                        <div class="modal-container bg-white w-[50%] md:w-[20%] md:max-w-md rounded-lg shadow-lg z-50 overflow-y-auto">
                            <div class="modal-content py-4 text-left px-3">
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-3 relative">
                                    <p class="text-2xl font-bold">Info</p>
                                    <button class="absolute modal-close cursor-pointer z-50 top-0 right-2">
                                        &times;
                                    </button>
                                </div>

                                <div class="w-full flex justify-center">
                                    <img src="{{ asset('images/shoe4.png') }}" alt="" class="rounded-full h-12 w-12 border border-red-400">
                                </div>
                                
                                <!-- Modal body -->
                                <div class="my-5">
                                    <p class="text-lg">Name: {{ Auth::User()->username }}</p>
                                    <p class="text-lg">Email: {{ Auth::User()->email }}</p>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="text-white bg-red-300 px-4 py-2 rounded-md">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                @else
                    <div class="md:flex md:items-center md:space-x-4">
                        <a href="{{ route('loginform') }}" class="text-white">Login</a>
                        <a href="{{ route('registerform')}}"
                            class="text-white bg-blue-500 px-4 py-2 rounded-md">Register</a>
                    </div>
                @endif

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

        
    </div>
    

    <div id="mobile-menu"
        class="hidden md:hidden bg-gray-800">
        <a href="#" class="block text-white py-2 px-4">Home</a>
        <a href="#" class="block text-white py-2 px-4">About</a>
        <a href="#" class="block text-white py-2 px-4">Services</a>
        <a href="#" class="block text-white py-2 px-4">Contact</a>
    </div>
</nav>

<script>

    document.addEventListener('DOMContentLoaded', function() {
    const modal = document.querySelector('#userModal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const modalClose = document.querySelector('.modal-close');
    const avatar = document.querySelector('.avatar');

    avatar.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    modalClose.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    modalOverlay.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});
</script>