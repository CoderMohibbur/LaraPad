<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
Schema::create('post_likes', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('post_id')->index();
    $table->unsignedBigInteger('user_id')->index();

    $table->foreign('post_id', 'post_likes_post_id_foreign')
          ->references('id')->on('posts')
          ->onDelete('cascade');

    $table->foreign('user_id', 'post_likes_user_id_foreign')
          ->references('id')->on('users')
          ->onDelete('cascade');

    $table->timestamps();

    $table->unique(['post_id', 'user_id']); // Prevent duplicate likes
});

    }

    public function down(): void {
        Schema::dropIfExists('post_likes');
    }
};
