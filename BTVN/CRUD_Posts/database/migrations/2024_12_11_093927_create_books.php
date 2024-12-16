<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // id: Mã sách
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->year('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại
            $table->unsignedBigInteger('library_id'); // Khóa ngoại, tham chiếu tới libraries.id
            $table->timestamps(); // created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('library_id')
                ->references('id')
                ->on('libraries')
                ->onDelete('cascade'); // Khi xóa thư viện, sách liên quan sẽ bị xóa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
