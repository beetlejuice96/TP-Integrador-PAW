<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SCHEDULES', function (Blueprint $table) {
            $table->id('ID_SCHEDULE');
            $table->string('DAY',50);
            $table->time('HOUR_FROM');
            $table->time('HOUR_TO');
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
        Schema::dropIfExists('SCHEDULES');
    }
}
