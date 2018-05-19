<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidebookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guidebookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('tourist_id');
            $table->integer('guide_id');
            $table->date('start_date');
            $table->date('ending_date');
            $table->time('starting_time');
            $table->time('ending_time');
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
        Schema::dropIfExists('guidebookings');
    }
}
