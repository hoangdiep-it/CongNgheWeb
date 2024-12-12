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
            $table->id(); // Mã học sinh
            $table->string('first_name', 50); // Tên học sinh
            $table->string('last_name', 50); // Họ đệm
            $table->date('date_of_birth'); // Ngày sinh
            $table->string('parent_phone', 20); // Số điện thoại phụ huynh
            $table->unsignedBigInteger('class_id'); // Khóa ngoại tham chiếu classes.id
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();
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
