<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade')->index();
            $table->ipAddress('ip_address')->nullable()->index();
            $table->string('user_agent')->nullable();
            $table->timestamp('viewed_at')->useCurrent();
        });
    }

    public function down(): void {
        Schema::dropIfExists('post_views');
    }
};
