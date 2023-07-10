<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $posts = Posts::latest()->get();
        foreach ($posts as $post) {
            $list[] = $post->id;
        }
        $upid = $post->upid;
        $comments = Comments::whereIn('post_id', $list)->get();
        $directory = 'public/images/' . $upid . '.jpg';

        return view('welcome', compact('posts', 'comments', 'directory'));
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

        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $upid = $post->id;
        $post->user_id = auth()->id();
        $post->save();

        Posts::create(['title', 'content', 'upid']);



        Storage::putFileAs('public/images', $picture, $upid . '.jpg');

        return redirect()->route('welcome')->with('success', 'Post created successfully.');
    }


    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'upid' => 'nullable'

        ]);

        $post = Posts::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->upid = $request->upid;
        $post->save();

        return redirect()->route('index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->route('index')->with('success', 'Post deleted successfully.');
    }
}
