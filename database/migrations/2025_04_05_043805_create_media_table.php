<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename'); // Stored filename (renamed if needed)
            $table->string('original_name'); // Original uploaded name
            $table->string('mime_type');
            $table->bigInteger('size');
            $table->string('folder'); // e.g. 2025/03
            $table->string('alt_text')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('uploaded_by')->constrained('users')->onDelete('cascade');
            $table->integer('position')->nullable(); // ✅ এই লাইনটি যোগ করো
            $table->json('meta_data')->nullable(); // sizes, webp paths etc
            $table->string('context_type')->nullable(); // Optional: model name
            $table->json('tags')->nullable(); // ✅ array হিসাবে tag store

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('media');
    }
};
