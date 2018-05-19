<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    Schema::drop('destination_photos');
        Schema::create('destination_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destination_id');
           // $table->foreign('destination_id')->references('id')->on('destinations');
            $table->string('image');
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
        Schema::dropIfExists('destination_photos');
    }
}
