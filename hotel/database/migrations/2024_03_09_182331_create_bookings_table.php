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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customerFirstName', 50);
            $table->string('customerLastName', 50);
            $table->string('customerEmail', 50)->unique();
            $table->string('customerPhone', 50);
            $table->date('booked_at');
            $table->date('booked_until');
            $table->unsignedBigInteger('room_id');

            $table->foreign('room_id')->references('id')->on('rooms')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
