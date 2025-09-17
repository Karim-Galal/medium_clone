<nav class=" top-0 left-0 w-full flex items-center justify-between px-4 py-2 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
    <!-- Left side -->
    <div
      {{-- x-data="{ open: false } --}}
      class="flex items-center space-x-4 ">
        <!-- Sidebar toggle -->
        <button
          @click="open = !open"
          class="p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg">
            <!-- Hamburger Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Medium Logo -->
        <a href="/" class="text-2xl font-bold dark:text-white">Medium</a>

        <!-- Search (hidden on small screens) -->
        <div class="hidden sm:flex items-center relative">
            <input type="text" placeholder="Search"
                  class="pl-10 pr-4 py-1 rounded-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <!-- Search icon -->
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 absolute left-3 text-gray-400 dark:text-gray-500"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
            </svg>
        </div>
    </div>

    <!-- Right side -->
    <div class="flex items-center space-x-4">

      <!-- Write Button (hidden on small screens) -->
      <a href="{{route('posts.create')}}" class="hidden sm:flex items-center px-3 py-1 text-gray-600 hover:text-gray-900 dark:hover:text-white dark:text-gray-300 rounded-full ">

          <x-heroicon-o-pencil-square class="w-6 h-6  " />

          Write

      </a>
        <!-- Notifications (hidden on small screens) -->
        <button class="hidden sm:block p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
        </button>




        <!-- Small screen search icon -->
        <button class="sm:hidden p-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
            </svg>
        </button>

        <!-- Profile Icon -->
        @auth
          {{-- <a href="{{route('profile.edit')}}" class="w-8 h-8 flex items-center justify-center bg-gray-300 dark:bg-gray-700 rounded-full text-white font-bold">
              {{ mb_substr(trim(Auth::user()->name), 0, 1)  }}
          </a> --}}

          <!-- Settings Dropdown -->
            <div class=" sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                              {{ mb_substr(trim(Auth::user()->name), 0, 1)  }}

                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show',  ['user' => auth()->user()->username])">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile edit') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>


        @endauth
        @guest
          <a
            href="{{route('login')}}"
            {{-- class=" flex items-center justify-center border-2 border- dark:border-gray-700  px-3 py-1 rounded-md text-white font-bold" --}}
            class="px-3.5 py-1.5 rounded-lg border border-gray-600
                    text-gray-800 dark:text-gray-200
                    bg-transparent cursor-pointer
                    hover:bg-gray-200 dark:hover:bg-gray-700
                    transition-colors duration-300"

          >
              Login
          </a>
        @endguest

    </div>
</nav>
