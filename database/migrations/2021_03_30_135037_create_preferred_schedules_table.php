<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferredSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PREFERRED_SCHEDULES', function (Blueprint $table) {
            $table->id('ID_PREFERRED_SCHEDULE');
            $table->string('DAY',15);
            $table->string('HOUR',15);
            //$table->index(['ID_PREF','ID_TURNO_P']);
            $table->unsignedBigInteger('ID_PENDING_APPOINTMENT');
            $table->foreign('ID_PENDING_APPOINTMENT')->references('ID_PENDING_APPOINTMENT')->on('PENDING_APPOINTMENTS');
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
        Schema::dropIfExists('PREFERRED_SCHEDULES');
    }
}
