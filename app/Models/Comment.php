<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentLike;

class Comment extends Model
{
    use HasFactory;

    public function like():HasMany{
        return $this->hasMany(CommentLike::class);
    }

    public function setLike(){
       $user_id =Auth::user()->id;
       $comment_id = $this->id;
       //dd($this);
       $this->like++;  
       $this->save();     
       CommentLike::create(['user_id' => $user_id, 'comment_id' => $comment_id]);
    }

    public function getLikes(){
        
       return $this->like;
    }

    public function unlike(){
        $user_id =Auth::user()->id;
        $comment_id = $this->id;
        $like = CommentLike::where('user_id', $user_id)
            ->where('comment_id', $comment_id)
            ->first();
        $like->delete();
        $this->like--;  
       $this->save();
    }


    protected $fillable = [
        'user_id',
        'content',
        'post_id',
        'comment_id',
        'like',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}