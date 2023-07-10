<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $comments = Comments::with('post')->get();
    //     return view('welcome', compact('posts'));
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {

        $user_id = Auth::user()->id;
        $posts = Post::where(['user_id', $user_id]);

        foreach ($posts as $post) {
            $list[] = $post->id;
        }
        $comments = Comments::whereIn('post_id', $list)->get();

        return view('welcome', compact('posts', 'comments'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $post_id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);
        $user_id = Auth::user()->id;
        $comments = [
            'user_id' => $user_id,
            'content' => $request->content,
            'post_id' => $post_id

        ];

        Comments::create([
            'user_id' => $user_id,
            'content' => $request->content,
            'post_id' => $post_id
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments, string $id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->getComments();


        return view('welcome', compact('posts', 'comments'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        return view('welcome', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        $request->validate([
            'content' => 'required',

        ]);


        $comments->content = $request->content;
        $comments->save();

        return redirect(route('welcome'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    { 
        $comment->delete();
        return redirect()->route('welcome');

    }
}
