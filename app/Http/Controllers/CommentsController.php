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

        return view('posts.add')->with([
            'comment_id' => 'create',
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments, string $id)
    {
        $comments = Comments::findOrFail($id);
        return view('posts.add')->with([
            'see' => 'show',
            'comment_id' => $comments
        ]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments, string $id)
    {
        $comments = Comments::findOrFail($id);
        return view('posts.add')->with([
            'see' => 'show',
            'comment_id' => $comments
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments, string $id)
    {
        Request::$request([
            'comment_id' => 'required|string',

        ]);

        $comments = Comments::findOrFail($id);
        $comments->content = $request->content;


        $comments->save();
        return redirect(route('posts.add'));
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comments, string $id)
    {
        $comments = Comments::findOrFail($id);
        $comments->delete();
        return redirect(route('posts.add'));
        //
    }
}
