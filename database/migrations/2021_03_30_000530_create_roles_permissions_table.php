<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ROLES_PERMISSIONS', function (Blueprint $table) {
            $table->id('ID_ROLE_PERMISSION');
            $table->unsignedBigInteger('ID_PERMISSION');
            $table->unsignedBigInteger('ID_ROLE');

            $table->foreign('ID_PERMISSION')->references('ID_PERMISSION')->on('PERMISSIONS')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_ROLE')->references('ID_ROLE')->on('ROLES')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ROLES_PERMISSIONS');
    }
}
