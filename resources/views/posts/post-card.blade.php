<div class="max-w-2xl mx-auto p-4">
  <div
    class="flex flex-col md:flex-row justify-between items-start gap-4 border-b border-gray-200 dark:border-gray-700 pb-6 mb-6"
  >
    <!-- Left side: author + title + meta -->
    <div class="flex-1">
      <!-- Author -->
      <div class="">
        <a href="{{route('profile.show', $post->user->username)}}" class=" flex items-center gap-2 mb-2">

          <x-profile-avatar :size="'w-8 h-8'" :user="$post->user" />
          <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
            {{$post->user->name}}
          </a>
        </span>
      </div>

      <!-- Post title -->
      <a
        {{-- href="{{route('posts.show', $post->slug)}}" --}}
        href="{{route('posts.show', parameters: ['user' =>$post->user->username , 'post' => $post->slug])}}"
        class="block ">
        <h2
          class="text-lg md:text-xl font-bold text-gray-900 dark:text-gray-100 mb-2"
        >
          {{-- How My Fear of Eyeglasses Impacted My Life --}}
          {{ $post->title }}
        </h2>

        <!-- Short description -->
      <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
        {{-- A short preview of the article content goes here. It’s usually one or
        two sentences only. --}}

        {{Str::words($post->content , 15) }}
      </p>
    </a>

      <!-- Meta info -->
      <div class="flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
        <time datetime="{{ $post->created_at->toDateString() }}">
          {{ $post->created_at->format('M d, Y') }}
      </time>
        <span>·</span>
        <span>
          <time datetime="{{ $post->created_at->toDateString() }}">
            {{ $post->created_at->format('M d, Y') }}
          </time>
        </span>
      </div>
    </div>

    <!-- Right side: thumbnail -->
      <div class="w-full md:w-40 flex-shrink-0">
        <img src="{{ $post->image ?? 'https://dummyimage.com/40/9af4ac/gray&text=No+Image' }}"
            alt="{{ $post->title }}"
            class="w-full h-28 object-cover rounded-md">


      </div>
  </div>
</div>
