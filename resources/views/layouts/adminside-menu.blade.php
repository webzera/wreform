<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-white dark:bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <svg height="55" width="170">
              <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                  <stop offset="0%"
                  style="stop-color:rgb(255,255,0);stop-opacity:1" />
                  <stop offset="100%"
                  style="stop-color:rgb(255,0,0);stop-opacity:1" />
                </linearGradient>
              </defs>
              <ellipse cx="100" cy="36" rx="65" ry="18" fill="url(#grad1)" />
              <text fill="#ffffff" font-size="24" font-family="Verdana"
              x="71" y="45">WRF</text>
            WRF
            </svg>
        </div>
    </div>

    <nav class="flex flex-col mt-10 px-4 text-center">        

        @if(Route::has('login'))                                
            @auth
                @if(Auth::user()->utype === 'ADM')
                    <x-jet-responsive-nav-link href="{{route('admin.dashboard')}}" :active="request()->routeIs('admin.dashboard')"
                    class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Home</x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{route('admin.slider')}}" :active="request()->routeIs('admin.slider')"
                    class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Sliders</x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{route('admin.post')}}" :active="request()->routeIs('admin.post')"
                    class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Posts</x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{route('admin.page')}}" :active="request()->routeIs('admin.page')"
                    class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Pages</x-jet-responsive-nav-link> 

                    <x-jet-responsive-nav-link href="{{route('admin.opinion')}}" :active="request()->routeIs('admin.opinion')"
                    class="mt-3 py-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Opinion</x-jet-responsive-nav-link>        

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-600 hover:text-white">Logout</a>
                    </form>
                @endif
            @endif
        @endif
               
    </nav>
</div>