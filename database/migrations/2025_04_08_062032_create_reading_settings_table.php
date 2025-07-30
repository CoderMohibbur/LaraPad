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
        Schema::create('reading_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('homepage_display', ['latest_posts', 'static_page'])->default('latest_posts');
            $table->unsignedBigInteger('homepage_id')->nullable();
            $table->unsignedBigInteger('posts_page_id')->nullable();
            $table->integer('blog_page_limit')->default(10);
            $table->integer('feed_limit')->default(10);
            $table->enum('post_feed_type', ['full_text', 'excerpt'])->default('full_text');
            $table->boolean('search_engine_visibility')->default(true); // true = discouraged
            $table->string('logo')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reading_settings');
    }
};
