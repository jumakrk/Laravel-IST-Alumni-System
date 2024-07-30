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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Added user_id
            $table->string('title');
            $table->string('location'); // Added location
            $table->string('type'); // Added type
            $table->longText('description');
            $table->text('qualifications'); // Added qualifications
            $table->date('application_deadline'); // Added application_deadline
            $table->date('posted_at'); // Changed from unsignedInteger to date
            $table->timestamps(); // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
