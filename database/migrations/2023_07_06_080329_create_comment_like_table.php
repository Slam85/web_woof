<?php

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comment_like', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignidFor(User::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('liked')->default(false);
            $table->foreignidFor(Comment::class)
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_like');
    }
};