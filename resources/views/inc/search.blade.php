<div class="w-full border-2 rounded-lg p-1 overflow-hidden my-10">
<form action="/" method="GET" class="flex justify-between">
    <div class="flex items-center w-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="hidden sm:block h-6 w-6 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        <input type="search" name="search" id="search" placeholder="search" value="{{old('search')}}" class="p-2 w-full focus:outline-none text-gray-500">
    </div>
    <input type="submit" value="search" class="hidden md:block rounded-md bg-blue-600 text-white p-2 cursor-pointer">

    <button type="submit" class="block md:hidden rounded-md bg-blue-600 text-center p-2 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
</form>
</div>