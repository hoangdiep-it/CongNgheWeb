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
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('device_name'); // Device name
            $table->enum('type', ['Mouse', 'Keyboard', 'Headset']); // Device type
            $table->boolean('status'); // Operational status
            $table->foreignId('center_id') // Foreign key
                  ->constrained('it_centers') // References id in it_centers
                  ->onDelete('cascade'); // Cascade delete
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
    }
};
