<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('service_id');
            $table->foreignId('car_id');
            $table->decimal('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnDelete();

            $table->foreign('service_id')->references('id')
                ->on('services')->cascadeOnDelete();

            $table->foreign('car_id')->references('id')
                ->on('cars')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
