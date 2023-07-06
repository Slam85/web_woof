<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('welcome')->with([
            'content' => 'create',
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comments $comments, string $user_id)
    {
        Request::$request([
            'content' => 'required|string',

        ]);

        $comments = Comments::findOrFail($user_id);
        $comments->content = $request->content;


        $comments->save();
        return redirect(route('welcome'));

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments, string $content)
    {
        $comments = Comments::findOrFail($content);
        return view('welcome')->with([
            'see' => 'show',
            'content' => $comments
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments, string $user_id)
    {
        $comments = Comments::findOrFail($user_id);
        return view('posts.add')->with([
            'see' => 'show',
            'content' => $comments
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments, string $user_id)
    {
        Request::$request([
            'comment_id' => 'required|string',

        ]);

        $comments = Comments::findOrFail($user_id);
        $comments->content = $request->content;


        $comments->save();
        return redirect(route('posts.add'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments, string $user_id)
    {
        $comments = Comments::findOrFail($user_id);
        $comments->delete();
        return redirect(route('posts.add'));
        //
    }
}
