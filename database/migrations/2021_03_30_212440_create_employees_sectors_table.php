<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMPLOYEES_SECTORS', function (Blueprint $table) {
            $table->id('ID_EMPLOYEE_SECTOR');
            $table->unsignedBigInteger('ID_SECTOR');
            $table->foreign('ID_SECTOR')->references('ID_SECTOR')->on('SECTORS');
            $table->unsignedBigInteger('ID_EMPLOYEE');
            $table->foreign('ID_EMPLOYEE')->references('ID_EMPLOYEE')->on('EMPLOYEES'); 
            //$table->index(['ID_SECTOR','ID_EMPLEADO','ID_TALLER']);
            
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
        Schema::dropIfExists('EMPLOYEES_SECTORS');
    }
}
