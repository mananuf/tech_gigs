@props(['listing'])

<div class="bg-slate-50 flex flex-col object-contain shadow-xl rounded-xl md:rounded-md md:flex-row">
    <div class="">
        <img src="{{ $listing->company_image ? asset('storage/' . $listing->company_image) : asset('img/tglogo.png')}}" class="h-full w-48 overflow-clip object-contain" alt="">
    </div>
    <div class="px-4 py-6 text-center space-y-2 md:text-left">
        <a class="text-black text-md capitalize border-b-2 hover:text-blue-600" href="{{url('listing/'.$listing->id)}}"> {{ $listing->title}} </a>
        <p class="text-black font-bold py-1">{{ $listing->company }}</p>
        <div class="py-1 flex justify-center md:justify-start">
            <x-listing-tags :tagsCSV="$listing->tags"/>
        </div>
        
        <p class="flex py-2 justify-center md:justify-start">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
              </svg>
            <span>{{ $listing->location }}</span>
        </p>
    </div>
</div>