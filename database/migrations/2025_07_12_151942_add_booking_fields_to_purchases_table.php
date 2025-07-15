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
        Schema::table('purchases', function (Blueprint $table) {
            $table->string('museum_name')->nullable();
            $table->string('ticket_type')->nullable(); // general, student
            $table->string('time_slot')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment_method')->nullable(); // dana, gopay
            $table->string('student_id_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn([
                'museum_name',
                'ticket_type',
                'time_slot',
                'full_name',
                'email',
                'phone',
                'payment_method',
                'student_id_path'
            ]);
        });
    }
};
