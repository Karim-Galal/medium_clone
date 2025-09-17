<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class=" shadow sm:rounded-lg">

              <div class="flex gap-4 ">

                <div class="main relative dark:bg-gray-800 p-4 w-full md:w-[calc(100% - 352px)]">
                  {{-- in small screens --}}
                  <div class="sm-info md:hidden mb-5 flex justify-between items-center dark:text-white w-full">

                    <!-- Profile info -->
                    <div class="flex gap-3 items-center">
                      <x-profile-avatar :user="$user" />
                      <div>
                        <h3 class="text-xl">{{$user->name}}</h3>
                        <x-followers-count :count="$user->followers()->count()" />
                      </div>
                    </div>

                    <!-- Follow button -->
                    <div class="flex gap-2 ">
                        <x-follow-btn :user="$user"/>

                      <button class="text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 transition">
                          <svg xmlns="http://www.w3.org/2000/svg"
                              fill="none" viewBox="0 0 24 24"
                              stroke-width="1.5" stroke="currentColor"
                              class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5
                                    0 .75.75 0 011.5 0zM12.75 12a.75.75
                                    0 11-1.5 0 .75.75 0 011.5
                                    0zM18.75 12a.75.75 0 11-1.5
                                    0 .75.75 0 011.5 0z"/>
                          </svg>
                      </button>
                    </div>

                  </div>

                  {{-- in md & above screens --}}
                  <div class="hidden md:flex dark:text-white justify-between items-center mb-5">
                    <h1 class="text-3xl" > {{$user->name}} </h1>
                    <div>
                      <button class="text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 transition">
                          <svg xmlns="http://www.w3.org/2000/svg"
                              fill="none" viewBox="0 0 24 24"
                              stroke-width="1.5" stroke="currentColor"
                              class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5
                                    0 .75.75 0 011.5 0zM12.75 12a.75.75
                                    0 11-1.5 0 .75.75 0 011.5
                                    0zM18.75 12a.75.75 0 11-1.5
                                    0 .75.75 0 011.5 0z"/>
                          </svg>
                      </button>
                    </div>
                  </div>
                  {{-- in all screens  --}}

                  <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                      <ul class="flex flex-wrap -mb-px ">
                          <li class="me-2">
                              <a href="#" class="inline-block p-4 border-b-2 border-gray-200 rounded-t-lg active hover:text-gray-600 hover:border-gray-300 dark:text-gray-300 aria-current="page"">Home</a>
                          </li>
                          <li class="me-2">
                              <a href="#" class="inline-block p-4 text-gray-600  rounded-t-lg  dark:text-gray-400 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" >About</a>
                          </li>
                      </ul>
                      <div class="content pt-5">
                        <div class="home">
                          {{-- display teh user's posts --}}
                          <div class="posts">

                            {{-- @foreach ($posts as $post)
                              @include('profile.profile-post-card', ['post' => $post])
                              @endforeach --}}

                            @forelse ($posts as $post)
                              @include('profile.profile-post-card', ['post' => $post])
                            @empty
                              <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                no posts to show
                              </div>
                            @endforelse

                          </div>

                        </div>
                      </div>
                  </div>

                </div>

                {{-- (side info) md screens & bigger --}}
                <div
                  class="sticky top-0 right-0 w-[352px] p-4 hidden md:block sideInfo dark:bg-gray-800 dark:text-white">
                  <x-profile-avatar :user="$user" />
                  <p class="py-3 dark:text-white">

                    {{$user->name }}
                  </p>

                  <x-followers-count :count="$user->followers()->count()" />
                  <p class="py-3 mb-2 dark:text-gray-300 text-gray-700">
                    {{$user->bio }}
                  </p>

                  <x-follow-btn :padding="'px-4 py-2'" :user="$user" />

                </div>


              </div>

            </div>
        </div>
    </div>
</x-app-layout>

