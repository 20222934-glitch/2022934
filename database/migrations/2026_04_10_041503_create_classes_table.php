<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_code', 50)->unique();
            $table->string('class_name', 100);
            $table->string('major', 100);
            $table->string('course', 20); // Khóa học: K62, K63,...
            $table->integer('total_students')->default(0);
            $table->string('homeroom_teacher', 100);
            $table->year('academic_year');
            $table->enum('semester', [1, 2, 3])->default(1);
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
