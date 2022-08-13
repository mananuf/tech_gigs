@extends('layouts.master')
@section('content')
<div class="flex flex-col space-y-6 p-4 rounded-lg shadow-lg bg-slate-50 max-w-md mx-auto my-40 md:max-w-lg">
    <div>
        <a href="{{url("/")}}" class="bg-blue-500 text-white px-4 py-2 justify-start">
            back
        </a>
    </div>
    <p class="text-lg text-gray-800">
        A verification email has been sent to <a href="{{$email}}" class="text-blue-500 hover:text-blue-800">{{$email}}</a>.
        <br>Kindly check your inbox and verify your account.
    </p>
    <div class="flex justify-center">
        <a href="{{url("/login")}}" class="bg-green-600 text-white px-7 py-2 rounded-md">
            Login
        </a>
    </div>
</div>
    
@endsection