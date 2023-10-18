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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->string('emp_card',20)->unique()->index();
            $table->string('first_name',50);
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->text('birth_place')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->string('phone_urgent', 20)->unique()->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_status')->default(false);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
