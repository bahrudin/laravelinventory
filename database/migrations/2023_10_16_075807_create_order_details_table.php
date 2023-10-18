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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('order_id')->nullable();
            $table->char('invoice_order',36)->nullable();
            $table->string('product_code',20)->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();

//            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('invoice_order')->references('invoice_order')->on('orders')->onDelete('cascade');
            $table->foreign('product_code')->references('code')->on('products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
