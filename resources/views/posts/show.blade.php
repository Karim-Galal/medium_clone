<x-app-layout>

{{-- @section(section: 'content') --}}

<div class="py-">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-4 md:p-6 text-gray-900 dark:text-gray-100">



                  {{-- <div class="max-w-3xl mx-auto px-4 py-8 "> --}}


                    <!-- Title -->
                    <h1 class="text-2xl   sm:text-4xl  md:text-5xl font-bold tracking-tight text-gray-900 dark:text-gray-100 leading-tight">
                      {{ $post->title }}
                    </h1>

                    <!-- Author Section -->
                    <div class="mt-6 flex items-center gap-4">
                      <a href="{{route('profile.show', $post->user->username)}}">

                        <x-profile-avatar :user="$post->user" />
                      </a>
                      <div>
                        {{-- <a href="{{route('profile.show', $post->user->username)}}"></a> --}}

                        <a href="{{route('profile.show', $post->user->username)}}">
                          <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                            {{ $post->user->name }}
                          </p>
                        </a>
                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 gap-2">
                          <span>{{ $post->created_at->format('M d, Y') }}</span>
                          <span>·</span>
                          {{-- <span>{{ ceil(str_word_count(strip_tags(string: $post->content)) / 200) }} min read</span> --}}
                          {{$post->readTime()}}
                        </div>
                      </div>
                      <div class="ml-auto">
                        <x-follow-btn :user="$post->user"/>
                      </div>
                    </div>

                    <!-- meta-actions   -->
                    @include('posts.post-meta-actions')

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-700">

                    <!-- Thumbnail -->
                    @if($post->image)
                      <div class="mb-6">
                        <img
                          src="{{ asset('storage/' . $post->image) }}"
                          alt="{{ $post->title }}"
                          class="w-full h-auto rounded-lg shadow"
                        >
                      </div>
                    @endif

                    <!-- Content -->
                    <div class="prose dark:prose-invert max-w-none leading-relaxed text-gray-800 dark:text-gray-200">
                      {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Tags -->
                    @if($post->tags && $post->tags->count())
                      <div class="mt-6 flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                          <a href="{{ route('tags.show', $tag->slug) }}"
                            class="text-xs px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600">
                            #{{ $tag->name }}
                          </a>
                        @endforeach
                      </div>
                    @endif

                    <!-- Divider -->
                    <hr class="my-8 border-gray-200 dark:border-gray-700">

                    <!-- Author Box -->
                    <div class="flex items-center gap-4">
                      {{-- <x-profile-avatar  :user="$post->user" /> --}}
                      <x-profile-avatar :user="$post->user" />
                      <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                          {{ $post->user->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                          {{ $post->user->bio ?? 'Author bio goes here...' }}
                        </p>
                      </div>
                    </div>

                  {{-- </div> --}}

                </div>
            </div>
        </div>
</div>



</x-app-layout>
