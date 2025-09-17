@props(['post'])

<div x-data="{
    hasLiked: {{ auth()->check() && $post->isLikedBy(auth()->user()) ? 'true' : 'false' }},
    likeCount : {{$post->likes()->count()}},
    toggleLike() {
        axios.post('{{ route('like.toggle', $post->id) }}')
            .then(res => {
                this.likeCount = res.data.likesCount;
                this.hasLiked = res.data.isLiked;
            })
            .catch(err => {
                console.log(err);
            });
    }
}"
>
    <button
      @auth
        @click="toggleLike()"
      @endauth
      class="flex items-center space-x-1 text-gray-400 hover:text-gray-300">

      <template x-if="hasLiked">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="white" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14 9V5a3 3 0 00-6 0v4H5a2 2 0 00-2 2v9a2 2 0 002 2h6a2 2 0 002-2h5a2 2 0 002-2v-5a2 2 0 00-2-2h-6z" />
        </svg>
      </template>

      <template x-if="!hasLiked">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M14 9V5a3 3 0 00-6 0v4H5a2 2 0 00-2 2v9a2 2 0 002 2h6a2 2 0 002-2h5a2 2 0 002-2v-5a2 2 0 00-2-2h-6z" />
        </svg>
      </template>

      <span x-text="likeCount"></span>
    </button>
</div>
