@extends('layouts.master')
@section('content')
    <div class="w-96 md:max-w-2xl md:w-full mx-auto bg-gradient-to-r from-white to-slate-50 p-5 my-5 border-2 border-transparent shadow-xl bg-opacity-50 ">
        <header class="p-1 border-b-4 text-center">
            <h2 class="font-oswald font-bold text-3xl text-gray-800">Create a Gig</h2>
            <p class="font-roboto text-gray-700 font-normal text-lg">post a gig to find a developer</p>
        </header>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="md:flex justify-between w-full">
                {{-- company name --}}
                <div class="p-1 m-1 w-full">
                    <label for="company" class="font-medium text-gray-700 block my-1 capitalize">Company Name</label>
                    <input type="text" name="company" value="{{old('company')}}" class="p-1 w-full capitalize rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('company') invalid-input @enderror">
                    @error('company')
                        <small class="text-red-600 text-sm"> {{$message}}</small>
                    @enderror
                </div>

                {{-- job Title --}}
                <div class="p-1 m-1 w-full">
                    <label for="title" class=" font-medium text-gray-700 block my-1 capitalize">Job Title</label>
                    <input type="text" name="title" value="{{old('title')}}" placeholder="eg: Full Stack Developer" class="capitalize p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('title') invalid-input @enderror">
                    @error('title')
                        <small class="text-red-600 text-sm"> {{$message}}</small>
                    @enderror
                </div>
            </div>

            {{-- location --}}
            <div class="p-1 m-1">
                <label for="location" class="font-medium text-gray-700 block my-1 capitalize">Job Location</label>
                <input type="text" name="location" value="{{old('location')}}" placeholder="eg: Jos, Plateau" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('location') invalid-input @enderror">
                @error('location')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- email --}}
            <div class="p-1 m-1">
                <label for="email" class="font-medium text-gray-700 block my-1 capitalize">Contact Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="company email" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('email') invalid-input @enderror">
                @error('email')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- url --}}
            <div class="p-1 m-1">
                <label for="url" class="font-medium text-gray-700 block my-1 capitalize">Website/Application URL</label>
                <input type="url" name="website" value="{{old('website')}}" placeholder="https://example.com" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('website') invalid-input @enderror">
                @error('website')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- tags --}}
            <div class="p-1 m-1">
                <label for="tags" class="font-medium text-gray-700 block my-1 capitalize">Tags (comma,separated,values)</label>
                <input type="text" name="tags" value="{{old('tags')}}" placeholder="eg: python,laravel,react" class="p-1 w-full rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('tags') invalid-input @enderror">
                @error('tags')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- company_image --}}
            <div class="p-1 m-1">
                <label for="company_image" class="font-medium text-gray-700 block my-1 capitalize">Company Image</label>
                <input type="file" name="company_image"  class="p-1 file:bg-blue-600 file:border-0 file:text-white file:p-2 file:rounded-lg rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('tags') invalid-input @enderror">
                @error('company_image')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            {{-- description --}}
            <div class="p-1 m-1">
                <label for="description" class="font-medium text-gray-700 block my-1 capitalize">job description</label>
                <textarea name="description" value="{{old('description')}}" cols="30" rows="7" placeholder="describe core work requirements" class="p-1 w-full ckeditor rounded-md focus:outline-blue-500 block border-[1px] border-gray-300 @error('description') invalid-input @enderror"></textarea>
                @error('description')
                    <small class="text-red-600 text-sm"> {{$message}}</small>
                @enderror
            </div>

            <div class="p-1 m-1 flex justify-end">
                <input type="submit" value="Post Gig" class="py-2  rounded-md cursor-pointer px-3 bg-gradient-to-r from-green-600 to-green-500 text-white">
            </div>
        </form>
    </div>
@endsection