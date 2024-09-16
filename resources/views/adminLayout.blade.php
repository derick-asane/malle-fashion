<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>malle fashion</title>
        @vite('resources/css/app.css')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

        <div class="flex h-screen">
            <aside class="w-[15%] bg-slate-400 p-4 rounded-md hidden md:flex md:flex-col gap-2">
                <!-- sidebar links etc -->

                <div class="flex items-center justify-center text-pink-300 text-[20px] bold italic">
                    <span>malle fashion</span>
               </div>

                <div class="w-[100%] flex flex-col items-center mb-4">
                    <img src="{{ asset('svg/avatar-icon.svg') }}" alt="User Avatar" class="rounded-full h-12 w-12 border border-red-400">
                    <span>{{Auth::User()->username}}</span>
                </div>
                <hr class="mb-4">
                <div class="flex flex-col gap-4">

                
                    <div class="text-white flex gap-6 items-center hover:bg-slate-600 rounded-md p-1">
                        <img src="{{ asset('svg/dashboard-icon.svg') }}" alt="" class="h-8 w-8">
                        <a href="http://">Dashboard</a>
                    </div>

                    <div class="text-white flex gap-6 items-center hover:bg-slate-600 rounded-md p-1">
                        <img src="{{ asset('svg/users-icon.svg') }}" alt="" class="h-8 w-8">
                        <a href="http://">Clients</a>
                    </div>

                    <div class="text-white flex gap-6 items-center hover:bg-slate-600 rounded-md p-1">
                        <img src="{{ asset('svg/product-icon.svg') }}" alt="" class="h-8 w-8">
                        <a href="http://">Products</a>
                    </div>
                    
                    <div class="text-white flex gap-6 items-center hover:bg-slate-600 rounded-md p-1">
                        <img src="{{ asset('svg/order-icon.svg') }}" alt="" class="h-8 w-8">
                        <a href="http://">Orders</a>
                    </div>
                </div>
               

            </aside>
            <div class="w-[100%] sm:w-[85%]">
                <section class="flex justify-between bg-white border-b-4 px-2 shadow-sm">
                    <div class=" ml-4 w-[50%] sm:w-[30%] flex items-center gap-2">
                        <img src="{{ asset('svg/search-icon.svg') }}" alt="search icon" class="h-5 w-5">
                        <input type="text" name="search" id="search" placeholder="Search here ..." class="w-[100%] h-full outline-none">
                    </div>
                    
                    <div class="w-[40%] sm:w-[15%] flex items-center justify-between">
                        <div class="relative">
                            <img src="{{ asset('svg/noti-bell.svg') }}" alt="" class="h-8 w-8">
                            <div class="animate-ping absolute bg-red-600 text-[8px] rounded-full top-0 left-2/3">6</div>
                        </div>
                        <span class="bold">{{Auth::User()->username}}</span>
                        <div class="avatar" data-toggle="modal" data-target="#userModal">
                            <!-- Display the user's avatar image here -->
                            <img src="{{ asset('svg/avatar-icon.svg') }}" alt="User Avatar" class="rounded-full h-10 w-10 border border-red-400">
                            
                        </div>
                    </div>
                </section>
                <main class="p-2">
                    @yield('adminContent')
                </main>
            </div>
                      
        </div>
        
        
       <x-footer />
        <script>
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
    
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>
