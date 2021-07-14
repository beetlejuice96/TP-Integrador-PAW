<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('JOBS', function (Blueprint $table) {
            $table->id("ID_JOB");
            $table->unsignedBigInteger("NUMBER")->nullable();
            $table->date("DATE")->nullable();
            $table->string("DESCRIPTION",200)->nullable();
            $table->string("KILOMETERS",50)->nullable();
            $table->unsignedBigInteger("ID_SERVICE")->nullable();
            $table->foreign('ID_SERVICE')->references('ID_SERVICE')->on('SERVICES')->onDelete('set null');
            $table->unsignedBigInteger("ID_VEHICLE")->nullable();
            $table->foreign('ID_VEHICLE')->references('ID_VEHICLE')->on('VEHICLES')->onDelete('cascade');
            $table->unsignedBigInteger('ID_EMPLOYEE');
            $table->foreign('ID_EMPLOYEE')->references('ID_EMPLOYEE')->on('EMPLOYEES');
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
        Schema::dropIfExists('JOBS');
    }
}
