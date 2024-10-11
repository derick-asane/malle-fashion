@extends('adminLayout')


@section('adminContent')
    <div class="w-full flex justify-center text-[20px] sm:text-[40px] bold italic">
        <span class="">List Of Delivered </span>
    </div>

    <hr class="py-4">

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-green-200 text-gray-600 uppercase text-sm leading-normal">
                        
                        <th class="py-3 px-6 text-center">UserName</th>
                        <th class="py-3 px-6 text-center">City</th>
                        <th class="py-3 px-6 text-center">Quarter</th>
                        <th class="py-3 px-6 text-center">Phone</th>
                        <th class="py-3 px-6 text-center">Amount</th>
                        <th class="py-3 px-6 text-center">Status</th>

                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($delivered_orders as $order)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">{{$order->user->username}}</td>
                            <td class="py-3 px-6 text-center" >{{$order->city}}</td>
                            <td class="py-3 px-6 text-center">{{$order->quarter}}</td>
                            <td class="py-3 px-6 text-center">{{$order->phone}}</td>
                            <td class="py-3 px-6 text-center">50,000</td>
                            <td class="py-3 px-6 text-center uppercase">{{$order->status}}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('order.details', ['id' => $order->id]) }}" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection