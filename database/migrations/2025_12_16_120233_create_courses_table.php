<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', callback: function (Blueprint $table) {
            $table->id();
            $table->string('course_ref')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('credits');
            $table->string('instructor');
            $table->timestamps();
            $table->index(['title', 'instructor']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
