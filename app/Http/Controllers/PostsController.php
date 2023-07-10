<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts;

        return view('posts.index', compact('posts'));
    }

    public function welcome()
    {

        $posts = Post::latest()->get();    
        $comments = Comment::latest()->get();
        $like = Like::where('user_id', Auth::id())
        ->first();
        $commentLike = CommentLike::where('user_id', Auth::id())
        ->first();
        return view('welcome', compact('posts', 'comments','like','commentLike'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('welcome')->with('success', 'Post created successfully.');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index')->with('success', 'Post deleted successfully.');
    }
}