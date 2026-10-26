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
        Schema::create('students', function (Blueprint $table) {
            $table->integerIncrements('StudentID');
            $table->string('StudentName');
            $table->string('StudentEmail');
            $table->enum('StudentGender', ['0','1']);
            $table->unsignedInteger('ClassRoomID');
            $table->foreign('ClassRoomID')->references('ClassRoomID')->on('ClassRooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
