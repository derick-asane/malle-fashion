
@extends('adminLayout')

@section('adminContent')


<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">Welcome admin, {{Auth::User()->username}} </span>
</div>



<div class="container mx-auto p-4">
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-green-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/users-icon.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Users</h2>
                <p class="text-white text-3xl">{{ $usersCount}}</p>
            </div>
        </div>
        
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-blue-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/order-icon.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Orders</h2>
                <p class="text-white text-3xl">{{ $ordersCount }}</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-yellow-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/delivered-icon.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Delivered Orders</h2>
                <p class="text-white text-2xl">{{ $deliveredOrdersCount }}</p>
            </div>
        </div>
        
    </div>
</div>

<div class="h-[350px] flex justify-center">
    <canvas id="myChart" class=""></canvas>
</div>


@endsection

    