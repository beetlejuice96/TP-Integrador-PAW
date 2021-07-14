<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MODELS', function (Blueprint $table) {
            $table->id('ID_MODEL');
            $table->string('NAME',200);
            $table->unsignedBigInteger('ID_BRAND')->nullable();
            $table->foreign('ID_BRAND')->references('ID_BRAND')->on('BRANDS');
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
        Schema::dropIfExists('MODELS');
    }
}
