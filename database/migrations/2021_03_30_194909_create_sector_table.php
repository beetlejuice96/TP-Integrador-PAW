<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SECTORS', function (Blueprint $table) {
            $table->id('ID_SECTOR');
            $table->string('NAME',200);
            //$table->string('DESCRIPCION',50)->nullable();
            $table->boolean('ACTIVE');
            //$table->index(['ID_SECTOR', 'ID_TALLER']);
            $table->unsignedBigInteger('ID_WORKSHOP');
            $table->foreign('ID_WORKSHOP')->references('ID_WORKSHOP')->on('WORKSHOPS');
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
        Schema::dropIfExists('SECTORS');
    }
}
