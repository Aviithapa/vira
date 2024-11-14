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
        Schema::create('student_forms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('district')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('gender')->nullable();
            $table->string('program')->nullable();
            $table->string('shift')->nullable();
            $table->string('college_name')->nullable();
            $table->string('total_gpa')->nullable();
            $table->string('school_type')->nullable();
            $table->string('father_mother_name')->nullable();
            $table->string('father_mother_contact')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_forms');
    }
};
