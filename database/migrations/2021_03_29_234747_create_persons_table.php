<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PERSONS', function (Blueprint $table) {
            $table->id('ID_PERSON');
            $table->string('NAME', 200)->nullable();
            $table->string('SURNAME', 200)->nullable();
            $table->string('DOCUMENT_NUMBER', 50)->nullable();
            $table->date('BIRTH_DATE')->nullable();
            $table->string('STREET', 200)->nullable();
            $table->integer('STREET_NUMBER')->nullable();
            $table->string('LOCALIDAD', 200)->nullable();
            $table->string('COUNTRY', 200)->nullable();
            $table->string('PHONE', 50)->nullable();
            $table->string('EMAIL', 200)->nullable();
            $table->string('POSTAL_CODE', 10)->nullable();
            $table->boolean('ACTIVE', 50)->default(1);
            $table->unsignedBigInteger('ID_DOCUMENT_TYPE')->default(1);
            $table->foreign('ID_DOCUMENT_TYPE')->references('ID_DOCUMENT_TYPE')->on('DOCUMENT_TYPES');
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
        Schema::dropIfExists('PERSONS');
    }
}
