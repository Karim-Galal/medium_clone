@props(['user','padding' => 'px-4 py-1'])


@if (auth()->user() && auth()->user()->id !== $user->id )

  <div x-data="{
          following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
          followersCount: {{ $user->followers()->count() }},
          follow() {
              this.following = !this.following;
              axios.post('{{ route('follow.toggle', $user->id) }}')
                  .then(res => {
                      this.followersCount = res.data.followers;
                  })
                  .catch(err => {
                      console.log(err);
                      {{-- console.log('+++++++++++++++++'); --}}
                  });
          }
      }">

    <button
      @click="follow()"
      class="{{$padding}} text-sm border rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
        {{-- Follow --}}
              <span x-text=" following ? 'Unfollow': 'Follow' "></span>

    </button>
  </div>

@endif

