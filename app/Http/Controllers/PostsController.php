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
        foreach ($posts as $post) {
            $list[] = $post->id;
        }
        $upid = $post->upid;
        $comments = Comment::whereIn('post_id', $list)->get();
        $directory = 'public/images/' . $upid . '.jpg';

        return view('welcome', compact('posts', 'comments', 'directory'));

        $posts = Post::latest()->get();
        $comments = Comment::latest()->get();
        $like = Like::where('user_id', Auth::id())
            ->first();
        $commentLike = CommentLike::where('user_id', Auth::id())
            ->first();
        return view('welcome', compact('posts', 'comments', 'like', 'commentLike'));
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
            'upid' => 'mimes:jpg,png,gif|max8192'
        ]);
        $picture = $request->file('image');

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->upid = $request->upid;
        $post->user_id = auth()->id();
        $post->save();

        Post::create(['title', 'content', 'upid']);



        Storage::putFileAs('public/images', $picture, $upid . '.jpg');

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
            'upid' => 'nullable'

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
