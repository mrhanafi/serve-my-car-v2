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
        Schema::create('my_vehicle_records', function (Blueprint $table) {
            $table->id();
            $table->string('current_mileage');
            $table->string('remark')->nullable();
            $table->date('date_of_service');
            $table->string('service_mileage')->nullable();
            $table->unsignedBigInteger('mylist_id');
            $table->foreign('mylist_id')->references('id')->on('my_lists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_vehicle_records');
    }
};
