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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->unique();
            $table->string('cat_code',10)->index()->nullable();
            $table->string('name', 100);
            $table->integer('qty')->nullable();
            $table->decimal('price_purchase',10,2)->nullable();
            $table->decimal('price_sale',10,2)->nullable();
            $table->boolean('is_status')->default(false);
            $table->text('descriptions')->nullable();
            $table->integer('sort_order')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cat_code')
                ->references('code')->on('product_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
