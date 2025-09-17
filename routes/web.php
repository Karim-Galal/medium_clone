<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', action: function () {
//     return view(view: 'dashboard');
// })->middleware(middleware: ['auth', 'verified'])->name('dashboard');


Route::get('/', [PostsController::class,'index'] )
->name('dashboard');

Route::get('/category/{category:slug}', [PostsController::class,'category'] )
->name('posts.byCategory');

Route::middleware(['auth', 'verified'])-> group(function () {


  Route::get('/posts/create', [PostsController::class,'create'] )
  ->name('posts.create');

  Route::post('/posts/store', [PostsController::class,'store'] )
  ->name('posts.store');

  // Route::get('/posts/{slug}', action: [PostsController::class,'show'] )
  // ->name('posts.show');

  Route::get('/posts/edit/{slug}', [PostsController::class,'edit'] )
  ->name('posts.edit');

  Route::get('/posts/update', [PostsController::class,'edit'] )
  ->name('posts.update');

  // follow & unfollow route
  Route::post('/follow/{user}', [FollowController::class, 'toggle'])
  ->name('follow.toggle');


  // like & unlike
  Route::post('/like/{post}', [LikesController::class, 'toggle'])
  ->name('like.toggle');

});


Route::get('@{user:username}', [PublicProfileController::class, 'show'])->name('profile.show');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch(uri: '/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/@{user:username}/{post:slug}', [PostsController::class,'show'])->name('posts.show');
});

require __DIR__.'/auth.php';
