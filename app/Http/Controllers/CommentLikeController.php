<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{

public function toggleComments(String $id)
{
$comment=Comment::findOrFail($id);
$user_id = Auth::user()->id;

$liked = CommentLike::where('comment_id', $comment->id)
->where('user_id', $user_id)
->first();

if (!$liked) {
$comment->setLike();
} else {
$comment->unlike();
}

return redirect('/');
}
}