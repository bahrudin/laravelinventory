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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('invoice_order',36)->unique()->nullable();
            $table->string('customer_card',20)->nullable();//sales input
            $table->string('emp_card',20)->nullable();//sales input
            $table->text('descriptions')->nullable();
            $table->timestamp('order_date');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('emp_card')->references('emp_card')->on('employees')->onDelete('cascade');
            $table->foreign('customer_card')->references('customer_card')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
