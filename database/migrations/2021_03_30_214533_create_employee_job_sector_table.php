<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEE_JOB_SECTOR', function (Blueprint $table) {
            $table->id('ID_EMPLOYEE_JOB_SECTOR');
            $table->unsignedBigInteger('ID_JOB');
            $table->foreign('ID_JOB')->references('ID_JOB')->on('JOBS')->onDelete('cascade');
            $table->unsignedBigInteger('ID_EMPLOYEE');
            $table->foreign('ID_EMPLOYEE')->references('ID_EMPLOYEE')->on('EMPLOYEES')->onDelete('cascade');
            $table->unsignedBigInteger('ID_SECTOR');
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('SECTORS')->onDelete('cascade');
            //$table->string('OBSERVACIONES',200)->nullable();
            //$table->index(['ID_TRABAJO','ID_EMPLEADO','ID_SECTOR']);
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
        Schema::dropIfExists('employee_job_sector');
    }
}
