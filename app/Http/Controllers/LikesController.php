<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{

    //   // $post->likes()->create([
    //   //   "user_id"=> Auth::user()->id,
    //   // ]);



    //   return response()->json([
    //     'likesCount'=> $post->likes()->count(),
    //   ]);
    // }

    public function toggle(Post $post) {
        $user = Auth::user();
        if ($post->isLikedBy($user)) {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            $post->likes()->create([
                "user_id" => $user->id,
            ]);
        }

        return response()->json([
            'likesCount' => $post->likes()->count(),
            'isLiked' => $post->isLikedBy($user),
        ]);
    }
}
