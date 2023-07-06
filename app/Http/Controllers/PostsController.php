<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function welcome ()
    {
        $posts = Posts::latest()->get();
        return view('welcome', compact('posts'));
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

        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully.');
    }

    public function edit(Posts $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('home')->with('success', 'Post updated successfully.');
    }

    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully.');
    }
}