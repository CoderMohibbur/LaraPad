<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->nullOnDelete();
            $table->string('title');
            $table->string('url')->nullable(); // parent হলে ফাঁকা রাখা যাবে
            $table->enum('menu_type', ['link','dropdown','mega'])->default('link');
            $table->enum('location', ['header','footer','both'])->default('header');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->enum('target', ['_self','_blank'])->default('_self');
            $table->string('icon')->nullable();
            
            $table->softDeletes();
            $table->timestamps();

            $table->index(['location','parent_id','sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
