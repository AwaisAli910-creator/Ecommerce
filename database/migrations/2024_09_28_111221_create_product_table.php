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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('category_id');
            $table->string('prod');
            $table->string('p_img');
            $table->string('descp');
            $table->string('prod_price');
            $table->string('selling_price');
            $table->string('discount_persent');
            $table->string('stock');
            $table->string('model');
            $table->string('delivery');
            $table->string('size');
            $table->string('slug');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
