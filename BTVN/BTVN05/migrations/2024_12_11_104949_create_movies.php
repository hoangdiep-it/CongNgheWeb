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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();  // Mã phim (primary key)
            $table->string('title');  // Tên phim
            $table->string('director');  // Đạo diễn
            $table->date('release_date');  // Ngày phát hành
            $table->integer('duration');  // Thời gian phim (phút)
            $table->foreignId('cinema_id')->constrained('cinemas')->onDelete('cascade');  // Khóa ngoại liên kết với cinemas
            $table->timestamps();  // Created at và Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
