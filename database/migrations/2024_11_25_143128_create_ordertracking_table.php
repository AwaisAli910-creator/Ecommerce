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
        Schema::create('ordertracking', function (Blueprint $table) {
            $table->id();
            $table->string('customer_phone'); // Track by phone number
            $table->string('order_status');   // Track order status
            $table->string('order_number');   // Unique order number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordertracking');
    }
};
