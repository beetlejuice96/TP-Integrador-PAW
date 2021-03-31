<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PENDING_APPOINTMENTS', function (Blueprint $table) {
            $table->id('ID_PENDING_APPOINTMENT');
            $table->date('REQUEST_DATE');
            $table->string('COMMENTS',300)->nullable();
            $table->boolean('ACTIVE');
            $table->unsignedBigInteger('ID_USER');
            $table->foreign('ID_USER')->references('ID_USER')->on('USERS');
            $table->unsignedBigInteger('ID_VEHICLE');
            $table->foreign('ID_VEHICLE')->references('ID_VEHICLE')->on('VEHICLES');
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
        Schema::dropIfExists('PENDING_APPOINTMENTS');
    }
}
