<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleBarbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_barbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('barber_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('costumer_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamp('schedule_at');
            $table->foreign('barber_id')->references('id')->on('barbers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('costumer_id')->references('id')->on('costumers');
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('schedule_barbers');
    }
}
