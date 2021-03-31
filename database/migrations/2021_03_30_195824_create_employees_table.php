<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEES', function (Blueprint $table) {
            $table->id('ID_EMPLOYEE');
            $table->string('NAME',200);
            $table->string('SURNAME',200);
            $table->date('ADMISSION_DATE')->nullable();
            $table->date('BIRTH_DATE')->nullable();
            $table->string('PHONE',50)->nullable();
            $table->string('EMAIL',200)->nullable();
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
        Schema::dropIfExists('EMPLOYEES');
    }
}
