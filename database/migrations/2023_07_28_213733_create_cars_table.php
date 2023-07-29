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
            $table->string('markCar',150)->nullable();
            $table->string('modelCar',150)->nullable();
            $table->string('colorCar',150)->nullable();
            $table->string('numberCar',6)->unique()->nullable();
            $table->boolean('availabilityCar')->nullable();;
            $table->unsignedBigInteger('client_id')->nullable();
            $table->index('client_id','car_client_idx');
            $table->foreign('client_id','car_client_fk')
                ->on('clients')
                ->references('id')
                ->onDelete('cascade');;
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
