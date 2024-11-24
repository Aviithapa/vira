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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('syllabus_url')->nullable();
            $table->string('academic_content_url')->nullable();
            $table->string('notes_url')->nullable();
            $table->string('mcq_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['syllabus_url','academic_content_url', 'notes_url', 'mcq_url']);
        });
    }
};
