<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('remote_id');
            $table->string('url')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->integer('year_start')->nullable();
            $table->integer('year_end')->nullable();
            $table->string('option')->nullable();
            $table->string('engine_cylinders')->nullable();
            $table->string('engine_displacement')->nullable();
            $table->string('engine_power')->nullable();
            $table->string('engine_torque')->nullable();
            $table->string('engine_fuel_system')->nullable();
            $table->string('engine_fuel')->nullable();
            $table->string('engine_c2o')->nullable();
            $table->string('performance_top_speed')->nullable();
            $table->string('performance_acceleration')->nullable();
            $table->string('fuel_economy_city')->nullable();
            $table->string('fuel_economy_highway')->nullable();
            $table->string('fuel_economy_combined')->nullable();
            $table->string('transmission_drive_type')->nullable();
            $table->string('transmission_gearbox')->nullable();
            $table->string('brakes_front')->nullable();
            $table->string('brakes_rear')->nullable();
            $table->string('tires_size')->nullable();
            $table->string('dimensions_length')->nullable();
            $table->string('dimensions_width')->nullable();
            $table->string('dimensions_height')->nullable();
            $table->string('dimensions_front_rear_track')->nullable();
            $table->string('dimensions_wheelbase')->nullable();
            $table->string('dimensions_ground_clearance')->nullable();
            $table->string('dimensions_cargo_volume')->nullable();
            $table->string('dimensions_cd')->nullable();
            $table->string('weight_unlade')->nullable();
            $table->string('weight_limit')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
