<div class="z-30 relative">
    <nav class="flex p-3 justify-between items-center shadow-xl bg-white">
        {{-- nav logo --}}
        <div>
            <a href="{{url('/')}}">
                <img src="{{asset('img/tglogo.png')}}" class="w-16" alt="TG-Logo">
            </a>
        </div>
        {{-- hamburger icon --}}
        <div></div>

        {{-- display for authenticated users --}}
        @auth
            <ul class="flex space-x-4 items-center">
                <li>
                    <img src="{{asset('img/default_user.png')}}" alt="" class="w-8 h-8 rounded-full">
                </li>
                <li>
                    <a href="#" class="capitalize hover:text-blue-500 hover:border-b-4 hover:border-blue-500 hover:pb-[21px]">
                        {{auth()->user()->name}}
                    </a>
                </li>
                <li>
                    <button class="hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" id="dropdown-btn" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </li>
                <div class="hidden flex flex-col bg-white top-[74px] right-1 shadow-lg absolute px-6 py-3 divide-y-2"
                 id="dropdown-items">
                    <a href="{{route('dashboard')}}" class="flex items-center space-x-2 lowercase py-2 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                        <span>dashboard</span>
                    </a>
                    <a href="{{route('create')}}" class="flex items-center space-x-2 lowercase py-2 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        <span>Create Gig</span>
                    </a>
                    <a href="{{route('dashboard')}}" class="flex items-center space-x-2 lowercase py-2 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                        <span>manage listings</span>
                    </a>
                    <form action="{{url('/logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="mx-auto lowercase py-2 hover:text-blue-500">
                            logout
                        </button>
                    </form>
                    
                </div>
            </ul>
        @else
        {{-- display for guest --}}
            <ul class="flex">
                <li class="mr-4">
                    <a href="{{URL::to("/register")}}" class="hover:text-blue-500 hover:border-b-4 hover:border-blue-500 hover:pb-[21px]">signup</a>
                </li>
                <li class="mr-4">
                    <a href="{{route('login')}}" class="hover:text-blue-500 hover:border-b-4 hover:border-blue-500 hover:pb-[21px]">login</a>
                </li>
            </ul>
        @endauth
    </nav>
    
</div>