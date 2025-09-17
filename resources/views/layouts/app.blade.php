<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-xxxxxxxx" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
      {{-- style="height: 10000px" --}}
      class=" font-sans antialiased dark ">
        <div class=" transform transition-all duration-300 ease-in-out ">


            <div class=" relative bg-gray-100 dark:bg-gray-900 min-h-screen
                          "
                x-data="{ open: window.innerWidth >= 1024 }"
                x-init="window.addEventListener('resize', () => { open = window.innerWidth >= 1024 })">

              <!-- Navbar -->
              <x-navbar />


              <!-- Sidebar -->
              <x-sidebar />

              <!-- Page Heading -->

              <!-- Page Content -->
              <main :class="open && window.innerWidth >= 1024 ? 'ml-52' : 'ml-0'"
                    class="p-6 transition-all">
                  {{ $slot }}

              </main>

            <!-- Page Content -->
                {{-- @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset --}}

          </div>
        </div>
    </body>
</html>
