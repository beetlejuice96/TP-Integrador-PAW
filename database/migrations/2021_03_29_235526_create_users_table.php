<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USERS', function (Blueprint $table) {
            $table->id('ID_USER');
            $table->string('NAME',200);
            $table->string('SURNAME',200);
            $table->string('PASSWORD',200);
            $table->string('EMAIL',200)->unique();
            $table->boolean('ACTIVE')->default(1);
            $table->timestamp('EMAIL_VERIFIED_AT')->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('ID_PERSON')->unique();
            $table->foreign('ID_PERSON')->references('ID_PERSON')->on('PERSONS')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('USERS');
    }
}
