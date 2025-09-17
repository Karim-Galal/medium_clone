@props(['user', 'padding' => 'px-4 py-1'])

@if (auth()->user() && auth()->user()->id !== $user->id)
    <div x-data="{
        {{-- isFollowing: {{ auth()->user()->following()->where('user_id', $user->id)->exists() ? 'true' : 'false' }}, --}}
        isFollowing: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
        followersCount: {{ $user->followers()->count() }},
        toggleFollow() {
            axios.post('{{ route('follow.toggle', $user->id) }}')
                .then(res => {
                    this.isFollowing = res.data.isFollowing;
                    this.followersCount = res.data.followersCount;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }">

        <button
            @auth
              @click="toggleFollow()"
            @endauth
            class="{{$padding}} text-sm border rounded-full hover:bg-gray-100 dark:hover:bg-gray-700"
        >
            <span x-text=" isFollowing ? 'Unfollow' : 'Follow' "></span>
        </button>
    </div>
@endif
