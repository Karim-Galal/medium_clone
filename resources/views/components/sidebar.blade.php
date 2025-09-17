<!-- resources/views/components/sidebar.blade.php -->
<aside
    {{-- x-data="{ open: true }"  --}}
    class="fixed inset-y-0 left-0 z-50 w-52 bg-white dark:bg-gray-700 shadow-lg transform transition-all duration-300 ease-in-out"
    {{-- :class="{ '-translate-x-full': !open, 'translate-x-0': open }" --}}
    :class="open
      ? (window.innerWidth >= 1024 ? 'translate-x-0 w-52' : 'translate-x-0 w-64 fixed inset-y-0 left-0 z-50')
      : (window.innerWidth >= 1024 ? '-ml-52 w-52' : '-translate-x-full w-64 fixed inset-y-0 left-0 z-50')"
>
    <!-- Header: Toggle + Logo -->
    <div class="flex items-center  p-4 py-2 border-b dark:border-gray-700">


      <!-- Toggle Button -->
        <button
          @click="open = !open"
          class="p-2 rounded-md dark:hover:text-gray-50 dark:text-gray-300   hover:text-gray-900 text-gray-700">
            <!-- Heroicon: Bars -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Logo -->
        <a href="/" class="text-2xl ps-3 font-bold dark:text-white">Medium</a>
    </div>

    <!-- Main Navigation -->
    <nav class="flex flex-col p-4 space-y-2">
        <a href="/" class="font-bold flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:text-white
        {{-- dark:text-gray-300 --}}
        ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            &nbsp;
            Home
        </a>

        <a href="{{route('dashboard')}}" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">

            {{-- <x-heroicon-o-collection class="w-5 h-5 mr-3"/>  --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg>
            &nbsp;
            Library
        </a>
        <a href="#" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            &nbsp;
            Profile
        </a>
        <a href="#" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">
            {{-- <x-heroicon-o-document-text class="w-5 h-5 mr-3"/>  --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            &nbsp;
            Stories
        </a>
        <a href="#" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
            </svg>
            &nbsp;
            Stats
        </a>
    </nav>

    <!-- Secondary Section -->
    <div class="p-4 border-t dark:border-gray-700">
        <a href="#" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
            &nbsp;
            Following
        </a>
        <a href="#" class="flex items-center p-2 rounded-md   hover:text-gray-900 text-gray-700  dark:hover:text-white  dark:text-gray-300">
            {{-- <x-heroicon-o-light-bulb class="w-5 h-5 mr-3"/> --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
            </svg>
            &nbsp;
            Discover
        </a>
    </div>
</aside>
