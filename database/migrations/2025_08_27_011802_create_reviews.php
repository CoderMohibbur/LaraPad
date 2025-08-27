<?php

// database/migrations/2025_08_27_000001_create_reviews_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reviews', function (Blueprint $t) {
            $t->id();

            // প্রদর্শনের জন্য লাগবে শুধু এইগুলো
            $t->decimal('rating', 2, 1)->default(5.0); // e.g., 5.0
            $t->text('quote');                          // "Clear communication..."
            $t->string('reviewer');                     // "Marketing Coordinator, Healthcare Provider"
            $t->string('verified_label')->nullable()->default('Verified Review');

            // UI/order control
            $t->unsignedInteger('order')->default(0);
            $t->boolean('is_active')->default(true);

            // soft delete আগে, তারপর timestamps
            $t->softDeletes();
            $t->timestamps();

            // helpful indexes
            $t->index(['is_active', 'order']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('reviews');
    }
};
