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
    Schema::create('posts', function (Blueprint $table) {
        $table->id();

        $table->string('title');
        $table->string('slug')->unique();
        $table->text('excerpt')->nullable();
        $table->longText('content')->nullable();
        $table->string('featured_image')->nullable();
        $table->enum('status', ['draft', 'published'])->default('draft');

        $table->string('post_type')->default('post'); // ✅ New: post/page/custom

        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // ✅ Advanced SEO fields
        $table->json('meta')->nullable();            // meta_title, meta_description
        $table->string('meta_keywords')->nullable(); // comma separated
        $table->string('canonical_url')->nullable();
        $table->string('og_title')->nullable();
        $table->text('og_description')->nullable();
        $table->string('og_image')->nullable();

        $table->timestamps();
        $table->softDeletes(); // ✅ Sub delete support
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
