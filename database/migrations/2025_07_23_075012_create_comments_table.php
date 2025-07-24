<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->constrained()
                ->onDelete('cascade')
                ->index();

            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id', 'comments_user_id_foreign')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->text('comment');
            $table->boolean('approved')->default(false)->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
