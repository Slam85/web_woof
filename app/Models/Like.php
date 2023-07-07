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
}