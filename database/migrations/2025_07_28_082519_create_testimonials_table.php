<?php

// database/migrations/xxxx_xx_xx_create_testimonials_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('designation')->nullable()->index();
            $table->string('company')->nullable();
            $table->string('image')->nullable();
            $table->text('quote')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('rating')->default(5)->index();
            $table->unsignedInteger('serial')->default(1)->index(); // ordering support
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('testimonials');
    }
};
