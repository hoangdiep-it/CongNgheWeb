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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('brand'); // Brand of the laptop
            $table->string('model'); // Model of the laptop
            $table->text('specifications'); // Specifications of the laptop
            $table->boolean('rental_status')->default(false); // Rental status (default: not rented)
            $table->unsignedBigInteger('renter_id')->nullable(); // Foreign key referencing renters table
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null');
            $table->timestamps(); // Created at, Updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
};
