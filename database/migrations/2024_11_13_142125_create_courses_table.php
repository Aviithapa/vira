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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('course_category_id');
            $table->string('category');
            $table->text('description')->nullable();
            $table->text('academic_content')->nullable();
            $table->text('curriculum');
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('rating', 3, 2);
            $table->integer('num_ratings');
            $table->integer('lectures');
            $table->decimal('duration', 5, 2);
            $table->string('skill_level');
            $table->string('language');
            $table->integer('students');
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
