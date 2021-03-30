<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEE_JOBS', function (Blueprint $table) {
            $table->id('ID_EMPLOYEE_JOB');
            $table->unsignedBigInteger('ID_JOB');
            $table->foreign('ID_JOB')->references('ID_JOB')->on('JOBS')->onDelete('cascade');
            $table->unsignedBigInteger('ID_EMPLOYEE');
            $table->foreign('ID_EMPLOYEE')->references('ID_EMPLOYEE')->on('EMPLOYEES')->onDelete('cascade');
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
        Schema::dropIfExists('EMPLOYEE_JOBS');
    }
}
