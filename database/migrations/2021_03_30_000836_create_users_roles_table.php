<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USERS_ROLES', function (Blueprint $table) {
            $table->id('ID_USER_ROLE');
            $table->unsignedBigInteger('ID_ROLE');
            $table->unsignedBigInteger('ID_USER');

            $table->foreign('ID_ROLE')->references('ID_ROLE')->on('ROLES')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_USER')->references('ID_USER')->on('USERS')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('USERS_ROLES');
    }
}
