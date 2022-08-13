@extends('layouts.master')
@section('content')
    <div class="mx-14 md:mx-24 my-10 font-roboto">
        @include('inc.search')
        {{-- control/modification buttons --}}
        <div class="flex space-x-5 my-10">
            {{-- display if user is register/auth --}}
            @if (!Auth::guest())
                {{-- display if the listing was created by the user --}}
                @if(Auth::user()->id == $listing->user_id)
                    {{-- edit buuton --}}
                    <a href="{{url('listing/edit/'.$listing->id)}}" class="bg-blue-600 flex justify-between rounded-lg px-4 py-2 text-white">
                        {{-- icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                        {{-- text --}}
                        <span class="block">Edit</span>
                    </a>

                    {{-- delete button --}}
                    <form action="{{url('listing/delete/'.$listing->id)}}" method="POST" class="flex justify-between px-4 py-2  bg-red-700 text-white rounded-md cursor-pointer">
                    @csrf
                    @method("DELETE")
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <input type="submit" value="Delete" class="cursor-pointer">
                    </form>
                @endif
            @endif
        </div>

        
                <div class="bg-white shadow-xl rounded-md md:grid md:grid-cols-3">
                    <div class="col-span-1">
                        {{-- image --}}
                        <img 
                            src="{{ $listing->company_image ? asset('storage/' . $listing->company_image) : asset('img/tglogo.png')}}" 
                            class="h-full w-full object-contain md:max-w-full overflow-hidden" alt=""
                        >
                    </div>
                    <div class="p-5 col-span-2">
                        <h3 class="text-black text-2xl py-1 capitalize font-bold border-b-2 font-oswald"> {{ $listing->title}} </h3>
                        <p class="text-black font-bold py-1">{{ $listing->company }}</p>
                        <div class="py-1">
                            <x-listing-tags :tagsCSV="$listing->tags"/>
                        </div>
                        
                        <p class="flex py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                              </svg>
                            <span>{{ $listing->location }}</span>
                        </p>
                        <h2 class="border-b-2 capitalize font-bold text-xl mt-3 py-1">Job Descrption</h2>
                        <p class="py-2">{!! html_entity_decode($listing->description) !!}</p>

                        {{-- --------------------- butons ----------------------------------- --}}
                        <div class="flex flex-col mt-6 space-y-4 md:flex-row md:space-y-0">
                            <a href="{{$listing->email}}" class="flex justify-center sm:my-4 md:my-0 bg-blue-500 text-white rounded-full md:mr-6 py-2 px-3 capitalize hover:bg-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                  </svg>
                                <span>Contact Employer</span>
                            </a>
                            <a href="{{$listing->website}}" class="flex justify-center sm:my-4 md:my-0 bg-gray-900 text-white rounded-full py-2 px-3 capitalize hover:bg-black">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd" />
                                </svg>
                                <span>Visit Website</span>
                            </a>
                        </div>
                    </div>
                </div>

    </div>
@endsection