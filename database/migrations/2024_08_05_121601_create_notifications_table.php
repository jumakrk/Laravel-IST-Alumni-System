<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('job_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();        
            $table->string('type'); // Used for notification type or category
            $table->boolean('is_read')->default(false); // Custom read status
            $table->timestamp('read_at')->nullable(); // Laravel's built-in read tracking
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['job_id']); // Drop foreign key constraint if it exists
        });

        Schema::dropIfExists('notifications');
    }
}
