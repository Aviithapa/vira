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
        Schema::table('student_forms', function (Blueprint $table) {
            $table->boolean('login_credentials_generated')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_forms', function (Blueprint $table) {
            $table->dropColumn('login_credentials_generated');
        });
    }
};
