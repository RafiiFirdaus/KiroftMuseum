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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_id')->nullable();

            // Booking specific fields
            $table->string('museum_name');
            $table->string('ticket_type');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->date('visit_date');
            $table->string('visitor_name');
            $table->string('visitor_phone');
            $table->string('visitor_email');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('booking_status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
