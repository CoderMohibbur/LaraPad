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
        Schema::create('writing_settings', function (Blueprint $table) {
            $table->id();
            $table->string('default_post_category')->nullable();
            $table->string('default_post_format')->nullable();
            $table->string('mail_server')->nullable();
            $table->integer('mail_port')->nullable()->default(110);
            $table->string('login_name')->nullable();
            $table->string('password')->nullable(); // encrypted later
            $table->string('default_mail_category')->nullable();
            $table->text('update_services')->nullable(); // comma or newline separated
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writing_settings');
    }
};
