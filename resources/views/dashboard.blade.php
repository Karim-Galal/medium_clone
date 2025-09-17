<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}






    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <ul class="flex flex-wrap justify-center  text-sm font-medium text-center text-gray-500 dark:text-gray-400 ">
                      <li class="me-2">
                          <a href="#" class="inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
                      </li>
                      @foreach ($categories as $cate)
                          <li class="me-2">
                              <a href="#"  class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{$cate->name}} </a>
                          </li>
                      @endforeach
                    </ul>
                </div>



            </div>
        </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 pt-8">

                  @foreach ($posts as $post)
                    @include('components.post-card', ['post' => $post])
                  @endforeach

                  <div class="pag flex flex-column justify-center mb-6">

                    {{$posts-> onEachSide(1) ->links()}}
                  </div>
                </div>





            </div>
        </div>
    </div>
</x-app-layout>
