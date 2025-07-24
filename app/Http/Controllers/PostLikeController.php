<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $user = auth()->user();

        if (! $user) {
            return response()->json(['success' => false, 'message' => 'Authentication required.'], 401);
        }

        $existingLike = PostLike::where('post_id', $post->id)
                                ->where('user_id', $user->id)
                                ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['success' => true, 'liked' => false]);
        }

        PostLike::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
        ]);

        return response()->json(['success' => true, 'liked' => true]);
    }
}

