<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\json;

;

class FollowController extends Controller
{
  //   public function toggle(User $user)
  // {
  //   dd($user);
  //   $authUser = Auth::user();

  //   $user->following()->toggle($authUser->id);

  //   return response()->json([
  //     'followers' => $user->following()->count(),
  //   ]);
  // }



    public function toggle(User $user)
    {
        // $authUser = Auth::user();

        // Prevent a user from following themselves.
        if (Auth::user()->id != $user->id) {
          return redirect('login');
        }

        // Use the auth user's 'following' relationship to toggle the target user.
        $user->following()->toggle($user->id);

        // Get the updated follower count for the user being followed.
        $followersCount = $user->followers()->count();

        // Determine the new state of the 'following' relationship.
        $isFollowingNewState = $user->following()->where('user_id', $user->id)->exists();

        return response()->json([
            'isFollowing' => $isFollowingNewState,
            'followersCount' => $followersCount,
        ]);
    }
    // public function toggle(User $user)
    // {
    //     $authUser = Auth::user();

    //     // Prevent a user from following themselves.
    //     if ($authUser->id === $user->id) {
    //         return response()->json(['message' => 'You cannot follow yourself.'], 403);
    //     }

    //     // Use the auth user's 'following' relationship to toggle the target user.
    //     $isFollowing = $authUser->following()->toggle($user->id);

    //     // Get the updated follower count for the user being followed.
    //     $followersCount = $user->followers()->count();

    //     // Determine the new state of the 'following' relationship.
    //     $isFollowingNewState = $authUser->following()->where('user_id', $user->id)->exists();

    //     return response()->json([
    //         'isFollowing' => $isFollowingNewState,
    //         'followersCount' => $followersCount,
    //     ]);
    // }
}
