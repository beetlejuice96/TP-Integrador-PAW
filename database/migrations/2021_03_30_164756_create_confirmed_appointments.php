<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmedAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONFIRMED_APPOINTMENTS', function (Blueprint $table) {
            $table->id('ID_CONFIRMED_APPOINTMENT');
            $table->dateTime('DATE');
            $table->boolean('ACTIVE');
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
        Schema::dropIfExists('CONFIRMED_APPOINTMENTS');
    }
}
