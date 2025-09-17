<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories = Category::all();
      $posts = Post::with('user')->latest()->paginate(5);

        return view("posts.index",
                    compact('categories', 'posts') );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      $categories = Category::all();
      $posts = Post::latest()->paginate(5);

        return view("posts.create",
                    compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cate_id = Category::inRandomOrder()->first->id;

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            // 'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'published_at' => ['nullable', 'date'],
        ]);

        # storing image in storage & db
        if ($request->hasFile(key: 'image')) {
            $data['image'] = $request->file('image')->store('uploads/posts', 'public');
        }


        $data['slug'] = Str::slug($data['title']);

        // while (Post::where('slug', $data['slug'])->exists()) {
        //     $data['slug'] .= '-' . Str::random(5);
        // }

        $data['user_id'] = Auth::id();

        #create the post
        $post = Post::create($data);

        # update to create the slug -> title-id
        $post->slug = Str::slug($post->title) . '-' . $post->id;
        $post->save();



        return redirect()->route('posts.show', ['user' =>$post->user->username , 'post' => $post->slug])
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show( $user ,  $slug)
    {

      // if (!$user) {
      //     abort(404);
      // }


      $post = Post::where('slug', $slug)->firstOrFail();

      return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {

      $categories = Category::all();

      $post = Post::where('slug', $slug)->firstOrFail();


      return view('posts.edit' , compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post) {


      $data = $request->validate([
          'title' => ['required', 'string', 'max:255'],
          'content' => ['required', 'string'],
          'user_id' => ['required' , 'exists:users,id' ],
          'category_id' => ['required', 'exists:categories,id'],
          // 'description' => ['required', 'string'],
          'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
          'published_at' => ['nullable', 'date'],
      ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/posts', 'public');
        }

        $data['user_id'] = Auth::id();

        $post->update($data);

        $post->slug = Str::slug($post->title) . '-' . $post->id;
        $post->save();


        return redirect()->route('posts.show', $post->slug)
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function category(Category $category)
    {
      $categories = Category::all();

      // $posts = Post::with('user')->latest()->paginate(5);
      $posts = $category->posts()->orderBy('created_at','desc')->paginate(10);

        return view("posts.index",
                    compact('categories', 'posts') );
    }


}
