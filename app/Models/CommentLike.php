<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Comment;

class CommentLike extends Model
{
    use HasFactory;
    protected $table='comment_like';
    protected $fillable=['user_id', 'comment_id'];
    public $timestamps=false;

public function comment(): BelongsTo {
    return $this ->belongsTo(Comment::class);
}
}
    