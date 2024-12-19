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
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Mã vấn đề
            $table->unsignedBigInteger('computer_id'); // Khóa ngoại tham chiếu computers.id
            $table->string('reported_by', 50)->nullable(); // Người báo cáo
            $table->datetime('reported_date'); // Thời gian báo cáo
            $table->text('description')->default(''); // Mô tả vấn đề, co the trong
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái
            $table->timestamps();

            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
