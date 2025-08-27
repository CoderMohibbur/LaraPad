<?php

// database/migrations/2025_08_27_000002_create_team_members_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('team_members', function (Blueprint $t) {
            $t->id();

            $t->string('name');                   // e.g., "Cody C. Jensen"
            $t->string('role')->nullable();       // e.g., "CEO & Founder"

            // image (remote/local যেকোনো একটা)
            $t->string('image_url')->nullable();
            $t->string('image_path')->nullable();

            // ছোট ছোট চিপ/স্কিল — JSON array
            $t->json('tags')->nullable();         // ["Lead Gen Strategy","Cold Email Deliverability", ...]

            // UI control
            $t->unsignedInteger('order')->default(0);
            $t->boolean('is_active')->default(true);

            // social (ঐচ্ছিক — দরকার হলে ব্যবহার)
            $t->string('linkedin_url')->nullable();
            $t->string('twitter_url')->nullable();

            // soft delete আগে, তারপর timestamps
            $t->softDeletes();
            $t->timestamps();

            $t->index(['is_active','order']);
        });
    }
    public function down(): void { Schema::dropIfExists('team_members'); }
};
