<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function setLike()
    {
        $user_id = Auth::user()->id;
        $post_id = $this->id;
        $this->like++;
        $this->save();
        Like::create(['user_id' => $user_id, 'post_id' => $post_id]);
    }

    public function getLikes()
    {

        return $this->like;
    }


    public function unlike()
    {
        $user_id = Auth::user()->id;
        $post_id = $this->id;
        $like = Like::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->first();
        $like->delete();
        $this->like--;
        $this->save();
    }


    protected $fillable = [
        'title',
        'content',
        'upid',
    ];
}
