@extends('layouts.master')
@section('content')
<div class="w-96 md:max-w-2xl md:w-full mx-auto bg-gradient-to-r from-white to-slate-50 p-5 my-5 border-2 border-transparent shadow-xl bg-opacity-50 ">
    <header class="p-1 border-b-4 text-center">
        <h2 class="font-oswald font-bold text-3xl text-gray-800">Login Your Gig Account</h2>
        <p class="font-roboto text-gray-700 font-normal text-lg">post a gig to find a developer</p>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
       
            
            {{-- email address--}}
            <div class="p-1 m-1 w-full">
                <label for="email" class=" font-medium text-gray-700 block my-1">Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="example@email.com" class=" p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('email') invalid-input @enderror">
                @error('email')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- password--}}
            <div class="p-1 m-1 w-full">
                <label for="password" class=" font-medium text-gray-700 block my-1">password</label>
                <input type="password" name="password" value="{{old('password')}}" placeholder="Enter password" class=" p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('password') invalid-input @enderror">
                @error('password')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>
       
  
        <div class="p-1 m-1 flex justify-center w-full">
            <input type="submit" value="Login Account" class="py-2  rounded-md cursor-pointer px-3 bg-gradient-to-r from-green-600 to-green-500 text-white">
        </div>

        <div class="mt-8 p-1">
            <p class="text-base text-black">Don't have an account? <a href="{{url('/register')}}" class="text-blue-500">Signup</a></p>
        </div>
    </form>
  </div>
@endsection