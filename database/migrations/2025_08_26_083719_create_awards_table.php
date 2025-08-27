<?php

// database/migrations/2025_08_26_000001_create_awards_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('awards', function (Blueprint $t) {
            $t->id();

            $t->string('title');                  // কার্ডে দেখানোর টেক্সট
            $t->string('image_path')->nullable(); // storage upload (optional)
            $t->string('image_url')->nullable();  // remote URL (optional)
            $t->unsignedSmallInteger('year')->nullable();
            $t->unsignedInteger('order')->default(0); // ছোট সংখ্যা = আগে দেখাবে
            $t->boolean('is_active')->default(true);

            // ⚠️ soft delete আগে, তারপর timestamps
            $t->softDeletes();
            $t->timestamps();

            // helpful indexes
            $t->index(['is_active', 'order']);
            $t->index('year');
        });
    }

    public function down(): void {
        Schema::dropIfExists('awards');
    }
};
