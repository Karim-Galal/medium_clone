
                  <form action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @isset($post)
                      @method('PUT')
                    @endisset
                    <!-- Post Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title ?? '')" required autofocus autocomplete="Title" placeholder="Title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- post image --}}
                    <div class="mb-4">
                      {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload image</label> --}}
                      <x-input-label for="content" :value="__('Upload image')" />
                      <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="file_input" type="file" name="image" :value="old('image',$post->image ?? '')">
                      <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Category selection --}}


                    <div class=" mb-4">
                      <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a category</label>
                      <select name="category_id" required id="categories"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option >Choose a category</option>
                        @foreach ($categories as $cat )

                          <option value="{{$cat->id}}"  @selected(old('category', $post->category_id ?? '') == $cat->id) >
                            {{$cat->name}}
                          </option>

                        @endforeach
                      </select>
                    </div>


                    {{-- post content --}}
                    <div class="mb-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-textarea-input id="content" class="block mt-1 w-full" type="text" name="content"  required  placeholder="Write Content" >
                          {{ old('content', $post->content ?? '')}}
                        </x-textarea-input>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">
                      {{ isset($post) ? 'Update' : 'Create' }}
                    </x-primary-button>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  </form>
