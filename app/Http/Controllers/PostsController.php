<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Models\Comments;
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
        $comments = Comments::whereIn('post_id', $list)->get();

        return view('welcome', compact('posts', 'comments'));
    }

    public function create()
    {

        $upid = Str::upid()->toString();
        Posts::create(['upid' => $upid]);


        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'upid' => 'nullable'
        ]);

        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->upid = $request->upid;
        $post->user_id = auth()->id();
        $post->save();

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
