<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('guide_id');
            $table->string('contactno')->unique();
            $table->string('experience');
            $table->string('about');
            $table->integer('cost_per_day');
            $table->integer('cost_per_hour');
            $table->integer('cost_per_service');
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
        Schema::dropIfExists('guides');
    }
}
