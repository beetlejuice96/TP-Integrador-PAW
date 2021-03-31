<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEE_SCHEDULES', function (Blueprint $table) {
            $table->id('ID_EMPLOYEE_SCHEDULE');
            $table->unsignedBigInteger('ID_EMPLOYEE');
            $table->foreign('ID_EMPLOYEE')->references('ID_EMPLOYEE')->on('EMPLOYEES');
            $table->unsignedBigInteger('ID_SCHEDULE');
            $table->foreign('ID_SCHEDULE')->references('ID_SCHEDULE')->on('SCHEDULES');
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
        Schema::dropIfExists('employee_schedules');
    }
}
