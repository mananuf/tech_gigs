@extends('layouts.master')
@section('content')
    <div class="container flex flex-col max-w-full space-y-10 p-6 rounded-md 
    mx-auto  md:space-y-0 md:space-x-6 md:flex-row">

        {{-- user details --}}
        <div class="p-6 shadow-md bg-white space-y-2 w-full mx-auto md:mx-0 md:w-60 md:mb-0">
            {{-- profile pic  --}}
            <div class="rounded-full w-32 h-32 mx-auto">
                <img src="{{asset('img/default_user.png')}}" alt="">
            </div>
            <h3 class="leading-6 font-semibold font-oswald text-slate-700 text-lg capitalize
            text-center">
                {{auth()->user()->name}}
            </h3>
            <hr class="border-slate-700 border-2">
            <p class="text-slate-800 text-md">{{auth()->user()->email}}</p>
            
        </div>

        {{-- listings --}}
        <div class="p-6 shadow-md bg-white space-y-2 max-w-3xl w-full mb-80 md:mb-0">
            <h2 class="text-slate-800 text-2xl uppercase font-roboto font-bold">Manage Listings</h2>
            <hr class="border-slate-700 border-2">

            
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Company name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Job Title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                location
                            </th>
                            <th scope="col" colspan="2" class="py-3 px-6 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                            @foreach ($listings as $listing)
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$listing->company}}
                                </th>
                                <td class="py-4 px-6 capitalize">
                                    {{$listing->title}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$listing->location}}
                                </td>
                                {{-- display if this user created created this listing --}}
                                @if (auth()->user()->id == $listing->user_id)
                                    <td class="py-4 px-6 text-right">
                                    
                                        {{-- edit buuton --}}
                                        <a href="{{url('listing/edit/'.$listing->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            {{-- icon --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 text-center md:hidden" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            {{-- text --}}
                                            <span class="hidden md:block">Edit</span>
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                        
                                        {{-- delete button --}}
                                        <form action="{{url('listing/delete/'.$listing->id)}}" method="POST" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            @csrf
                                            @method("DELETE")
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer text-center md:hidden" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            <input type="submit" value="Delete" class="hidden cursor-pointer md:block">
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        
                            @endforeach
                            
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
    {{-- include footer --}}
    @include('inc.footer')
@endsection