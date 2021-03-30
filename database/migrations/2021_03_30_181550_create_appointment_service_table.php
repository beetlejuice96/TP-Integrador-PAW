<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('APPOINTMENTS_SERVICES', function (Blueprint $table) {
            $table->id('ID_APPOINTMENT_SERVICE');
            $table->unsignedBigInteger('ID_SERVICE');
            $table->foreign('ID_SERVICE')->references('ID_SERVICE')->on('SERVICES');
            $table->unsignedBigInteger('ID_PENDING_APPOINTMENT');
            $table->foreign('ID_PENDING_APPOINTMENT')->references('ID_PENDING_APPOINTMENT')->on('PENDING_APPOINTMENTS');
            //$table->string('OBSERVACIONES',300)->nullable();            
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
        Schema::dropIfExists('APPOINTMENTS_SERVICES');
    }
}
