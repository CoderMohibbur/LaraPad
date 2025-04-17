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
        Schema::create('discussion_settings', function (Blueprint $table) {
            $table->id();
        
            // Default post settings
            $table->boolean('notify_linked_blogs')->default(true);
            $table->boolean('allow_pingbacks')->default(true);
            $table->boolean('allow_comments')->default(true);
        
            // Other comment settings
            $table->boolean('require_name_email')->default(true);
            $table->boolean('require_registered_user')->default(false);
            $table->integer('comment_close_days')->nullable();
            $table->integer('threaded_comments_level')->nullable();
            $table->boolean('break_comments_pages')->default(false);
            $table->integer('comments_per_page')->nullable();
            $table->integer('default_comment_page')->nullable();
        
            // Email me
            $table->boolean('email_on_comment')->default(true);
            $table->boolean('email_on_moderation')->default(true);
        
            // Before comment appears
            $table->boolean('manual_approve')->default(false);
            $table->boolean('previously_approved')->default(true);
        
            // Moderation
            $table->text('moderation_keys')->nullable();
            $table->text('disallowed_keys')->nullable();
        
            // Avatar settings
            $table->boolean('show_avatars')->default(true);
            $table->enum('avatar_rating', ['G', 'PG', 'R', 'X'])->default('G');
            $table->string('default_avatar')->default('mystery');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussion_settings');
    }
};
