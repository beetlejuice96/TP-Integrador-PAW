<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VEHICLES', function (Blueprint $table) {
            $table->id('ID_VEHICLE');
            $table->string('NUMBER_PLATE',10);
            $table->string('VIN',100)->nullable();
            $table->string('YEAR',10)->nullable();
            $table->string('ENGINE_NUMBER',100)->nullable();
            $table->unsignedBigInteger('ID_MODEL')->nullable();
            $table->foreign('ID_MODEL')->references('ID_MODEL')->on('MODELS');
            $table->unsignedBigInteger('ID_PERSON')->nullable();
            $table->foreign('ID_PERSON')->references('ID_PERSON')->on('PERSONS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VEHICLES');
    }
}
