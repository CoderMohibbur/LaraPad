<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');                 // e.g. /uploads/gallery/1.jpg
            $table->string('alt')->nullable();
            $table->string('caption')->nullable();
            $table->string('tag')->nullable()->index();   // Awards, Team, Clients...
            $table->unsignedSmallInteger('year')->nullable()->index();
            $table->unsignedInteger('position')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->json('meta')->nullable();             // extra data if needed
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('gallery_items');
    }
};
