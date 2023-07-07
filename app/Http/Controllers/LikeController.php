<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class LikeController extends Controller
{
    public function create(String $id)
    {
        $post=Posts::findOrFail($id);
        $post->setLike();
        return redirect ('/');
    }

    public function destroy(String $id)
    {
        $post=Posts::findOrFail($id);
        $post->unlike();
        return redirect ('/');
    }
}