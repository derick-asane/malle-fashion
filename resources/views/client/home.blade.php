@extends('Layout')


@section('content')
    <div class="w-full flex justify-center text-[40px] bold">
        <span>Welcome, {{Auth::User()->username}} </span>
    </div>

    <div>

    </div>
   
@endsection