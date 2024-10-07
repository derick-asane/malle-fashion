@extends('adminLayout')


@section('adminContent')
 
    <div class="w-full flex justify-center text-[20px] sm:text-[40px] bold italic">
        <span class="">List Of users </span>
    </div>

    <hr class="py-4">

    <!-- Products table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">ID</th>
                    <th class="py-3 px-6 text-center">UserName</th>
                    <th class="py-3 px-6 text-center">Email</th>
                    <th class="py-3 px-6 text-center">Role</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">{{ $user->id }}</td>
                        <td class="py-3 px-6 text-center" >{{$user->username}}
                        </td>
                        <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                        <td class="py-3 px-6 text-center">{{ $user->role }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">Edit</a>
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

@endsection
