<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SECTOR_SERVICES', function (Blueprint $table) {
            $table->id('ID_SECTOR_SERVICE');
            $table->unsignedBigInteger('ID_SERVICE');
            $table->unsignedBigInteger('ID_SECTOR');
            //$table->unsignedBigInteger('ID_TALLER');
            //$table->index(['ID_SERVICIO','ID_SECTOR'/*,'ID_TALLER'*/]);
            $table->foreign('ID_SERVICE')->references('ID_SERVICE')->on('SERVICES');
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
        Schema::dropIfExists('SECTOR_SERVICES');
    }
}
