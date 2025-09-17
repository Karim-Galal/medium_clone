<section
    x-data="{ liked: false, likes: {{ $post->likes ?? 0 }} }"
    class="flex items-center justify-between py-4 border-t border-b border-gray-200 dark:border-gray-700 mt-6"
>
    <!-- Left controls -->
    <div class="flex items-center gap-6">
        <!-- Clap / Like -->
        <x-likes-btn  :post="$post" :count="$post->likes()->count()" />

        <!-- Comments -->
        <button class="flex items-center gap-2 text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M7.5 8.25h9m-9 3h6m-1.5 7.5a9
                      9 0 100-18 9 9 0 000 18z"/>
            </svg>
            <span>{{ $post->comments_count ?? 0 }}</span>
        </button>
    </div>

    <!-- Right controls -->
    <div class="flex items-center gap-4">
        <!-- Save bookbark -->
        {{-- <button class="text-gray-600 dark:text-gray-300 hover:text-green-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17.593 3.322c1.1.128
                      1.907 1.077 1.776 2.177l-1.263
                      10.62a1.875 1.875 0 01-1.865
                      1.631H7.759c-1.1 0-2.01-.8-2.14-1.897L4.356
                      5.5a1.875 1.875 0 011.776-2.178l11.461-.001z"/>
            </svg>
        </button> --}}
        <button class="flex items-center space-x-1text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3-7 3V5z" />
          </svg>
        </button>

        <!-- Share -->
        <button class="text-gray-600 dark:text-gray-400 dark:hover:text-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor"
                 class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.5 12.75l7.5-7.5m0 0l7.5
                      7.5m-7.5-7.5v15"/>
            </svg>
        </button>

        <!-- More options -->
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
</section>
