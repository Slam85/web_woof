<?php

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->foreign('comment_like.comment_id');
            $table->string('content');
            $table->bigInteger('user_id');
            $table->bigInteger('post_id');
<<<<<<< HEAD
=======
            $table->timestamps();
>>>>>>> Dev2
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
