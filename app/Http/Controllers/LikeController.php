<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Like;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(String $id)
    {
        $post=Posts::findOrFail($id);
        $user_id = Auth::user()->id;

        $liked = Like::where('post_id', $post->id)
                     ->where('user_id', $user_id)
                     ->first();

    if (!$liked) {
        $post->setLike();
    } else {
        $post->unlike();
    }

    return redirect('/');
    }

    public function toggleComments(String $id)
    {
        $comment=Comments::findOrFail($id);
        $user_id = Auth::user()->id;

        $liked = Like::where('comment_id', $comment->id)
                     ->where('user_id', $user_id)
                     ->first();

    if (!$liked) {
        $comment->setLike();
    } else {
        $comment->unlike();
    }

    return redirect('/');
    }

}