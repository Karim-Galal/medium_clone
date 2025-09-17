<div class="max-w-2xl mx-auto p-4">
  
    <div class="flex flex-col md:flex-row gap-6 border-b border-gray-200 dark:border-gray-700 pb-6 mb-6">

      <!-- Left Content -->
      <div class="flex-1">
        <!-- Title + Excerpt -->
        <a href="{{ route('posts.show', ['user' => $user->username, 'post' => $post->slug]) }}">
          <h2 class="text-left text-xl font-bold text-gray-900 dark:text-gray-100 mb-2 hover:text-orange-600 transition">
            {{ $post->title }}
          </h2>
          <p class="text-left text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
            {{ Str::words(strip_tags($post->content), 25) }}
          </p>
        </a>

        <!-- Meta Info -->
        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400 mt-3">
          <time datetime="{{ $post->created_at->toDateString() }}">
            {{ $post->created_at->format('M d, Y') }}
          </time>
          <span>·</span>
          <span>{{ $post->readTime($post->content) }}</span>
        </div>
      </div>

      <!-- Thumbnail -->
      <div class="w-full md:w-40 flex-shrink-0">
        <img src="{{ $post->image ?? 'https://dummyimage.com/40/9af4ac/gray&text=No+Image' }}"
             alt="{{ $post->title }}"
             class="w-full h-28 object-cover rounded-md">
      </div>

    </div>

</div>
