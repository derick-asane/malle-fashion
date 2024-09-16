
@extends('adminLayout')

@section('adminContent')


<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">Welcome admin, {{Auth::User()->username}} </span>
</div>

@endsection

    