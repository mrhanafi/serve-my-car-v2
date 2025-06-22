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
        Schema::create('vehicle_record_details', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('remark')->nullable();
            $table->decimal('price',10,2)->default(0);
            $table->unsignedBigInteger('maintenance_id')->nullable();
            $table->foreign('maintenance_id')->references('id')->on('maintenances')->onDelete('cascade');
            $table->unsignedBigInteger('record_id')->nullable();
            $table->foreign('record_id')->references('id')->on('my_vehicle_records')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_record_details');
    }
};
