<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DETAILS', function (Blueprint $table) {
            $table->id('ID_DETAIL');
            $table->string("DESCRIPTION",50)->nullable();
            $table->integer("AMOUNT")->nullable();
            $table->unsignedBigInteger("ID_JOB");
            $table->foreign('ID_JOB')->references('ID_JOB')->on('JOBS')->onDelete('cascade');
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
        Schema::dropIfExists('DETAILS');
    }
}
