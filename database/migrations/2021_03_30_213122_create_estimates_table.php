<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ESTIMATIONS', function (Blueprint $table) {
            $table->id('ID_ESTIMATION');
            $table->date('ESTIMATED_DATE');
            $table->float('DAY_AVERAGE');
            $table->boolean('MAIL_SENT')->default(0);
            $table->boolean('PENDING_SHIPMENT')->default(0);
            $table->date('LAST_JOB_DATE');
            $table->boolean('ACTIVE')->default(1);
            $table->unsignedBigInteger('ID_VEHICLE');
            $table->foreign('ID_VEHICLE')->references('ID_VEHICLE')->on('VEHICLES')->onDelete('cascade');
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
        Schema::dropIfExists('ESTIMATIONS');
    }
}
