<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

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
    public function create(Request $request)
    {

        return view('welcome');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required,string',
        ]);

        $comments = [
            'content' => $request->content,
        ];

        Comments::create([
            'content' => $request->content,
        ]);

        return redirect()->route('comments.store')->with($comments);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments, string $content)
    {
        $comments = Comments::findOrFail($content);
        return view('welcome')->with([

            'content' => $comments
        ]);
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
    public function destroy(Comments $comments)
    {

        $comments->delete();
        return redirect(route('welcome'));
        //
    }
}
