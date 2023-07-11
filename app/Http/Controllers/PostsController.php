<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $list = $posts->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id', $list)->get();
        $likes = Like::all();
        $commentLikes = CommentLike::all();

        $directory = '';
        if ($posts->isNotEmpty()) {
            $directory = 'public/images/' . $posts->first()->upid . '.jpg';
        }

        return view('welcome', compact('posts', 'comments', 'likes', 'commentLikes', 'directory'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $info = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,png,gif|max:8192'
        ]);

        $picture = $request->file('image');
        if ($picture != null) {
        $img = Storage::putFile('public/images', $picture);
        }
        else {
            $img = null;
        }
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        if ($img != null) {
        $post->image = $img;}

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
            'image' => 'nullable'

        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->upid = $request->upid;
        $post->save();

        return redirect()->route('index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index')->with('success', 'Post deleted successfully.');
    }
}