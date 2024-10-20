@extends('Layout')


@section('content')
    <div class="w-full flex justify-center text-[40px] bold">
        <span>Welcome, {{Auth::User()->username}} </span>
    </div>

    <div class="w-full">
        <img src="{{ asset('images/male-fashion.jpg') }}" alt="male-fashion" class="w-[100%]">
    </div>
   
@endsection