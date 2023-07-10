<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;
    protected $table='post_like';
    protected $fillable=['user_id', 'post_id'];
    public $timestamps=false;

    public function like(): BelongsTo {
        return $this ->belongsTo(Posts::class);
    }

    protected $comment='comment_like';
    protected $fillableComments=['user_id', 'comment_id'];

    public function likeComments(): BelongsTo {
        return $this ->belongsTo(Comments::class);
    }
}