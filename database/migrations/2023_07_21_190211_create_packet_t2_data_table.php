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
        Schema::create('packet_t2_data', function (Blueprint $table) {
            $table->id();
            $table->string('packet_id');
            $table->string('device_id');
            $table->string('sensometer_id');
            $table->timestamp('device_timestamp');
            $table->integer('data_count');
            $table->string('meter_param_id');
            $table->string('meter_id');
            $table->string('phase');
            $table->string('sensor_type');
            $table->string('type');
            $table->float('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packet_t2_data');
    }
};
