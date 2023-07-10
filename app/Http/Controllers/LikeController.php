<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(String $id)
    {
        $post = Post::findOrFail($id);
        $user_id = Auth::user()->id;
        $liked = Like::where('post_id', $post->id)
            ->where('user_id', $user_id)
            ->first();

        if (!$liked) {
            $post->setLike();
            return redirect('/')->with('success', '👍 You like this!!');
        } else {
            $post->unlike();
            return redirect('/')->with('success', '👎 You hate this!!');
        }
        return redirect('/');
    }


    
   }