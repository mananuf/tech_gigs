@if (session('success'))
    <div 
        x-data ="{show:true}" x-init="setTimeout(() => show = false, 4000)"
        x-show="show" class="p-4 z-50 fixed top-24 right-1 bg-white shadow-lg">
        {{-- flex container --}}
        <div class="flex flex-row space-x-3 items-center">

            {{-- icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>

            {{-- message --}}
            <p class=" text-slate-600">{{ session('success')}}</p>
        </div>
    </div>
@endif

{{--  ----------------------------------- error ------------------------- --}}
@if (session('error'))
    <div 
        x-data ="{show:true}" x-init="setTimeout(() => show = false, 5000)"
        x-show="show" class="p-4 z-50 fixed top-14 right-1 bg-white shadow-lg">
        {{-- flex container --}}
        <div class="flex flex-row space-x-3 items-center">

            {{-- icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>

            {{-- message --}}
            <p class="text-slate-600">{{ session('error')}}</p>
        </div>
    </div>
@endif

{{-- -------------------------info ------------------------- --}}
@if (session('info'))
    <div 
        x-data ="{show:true}" x-init="setTimeout(() => show = false, 5000)"
        x-show="show" class="p-4 z-50 fixed top-14 right-1 bg-white shadow-lg">
        {{-- flex container --}}
        <div class="flex flex-row space-x-3 items-center">

            {{-- icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
              </svg>

            {{-- message --}}
            <p class="text-slate-600">{{ session('info')}}</p>
        </div>
    </div>
@endif


{{-- --------------------------- for any errors -------------------------- --}}
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div 
        x-data ="{show:true}" x-init="setTimeout(() => show = false, 5000)"
        x-show="show" class="p-4 z-50 fixed top-14 right-1 bg-white shadow-lg">
        {{-- flex container --}}
        <div class="flex flex-row space-x-3 items-center">

            {{-- icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-700" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>

            {{-- message --}}
            <p class="text-slate-600">{{$error}}</p>
        </div>
    </div>
@endforeach
@endif