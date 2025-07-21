<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique()->index();

            // Category foreign key with custom constraint name
            $table->unsignedBigInteger('category_id')->nullable()->index();
            $table->foreign('category_id', 'fk_posts_category')
                  ->references('id')
                  ->on('categories')
                  ->nullOnDelete();

            // Author foreign key with custom constraint name
            $table->unsignedBigInteger('author_id')->nullable()->index();
            $table->foreign('author_id', 'fk_posts_author')
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->string('image_url')->nullable();

            $table->json('meta')->nullable(); // meta_title, meta_description, meta_keywords
            $table->timestamp('published_at')->nullable()->index();

            $table->softDeletes(); // ✅ placed before timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
