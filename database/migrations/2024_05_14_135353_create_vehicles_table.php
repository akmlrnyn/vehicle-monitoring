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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('office_id');
            $table->string("name");
            $table->integer('gas_consumption');
            $table->integer('total_gas_price');
            $table->enum('is_taken', ["true", "false"]);
            $table->enum('owner', ['rental', 'owned']);
            $table->date('next_car_service');
            $table->timestamps();

            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
