<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWillingnessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('willingness', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pin');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('day_code');
            $table->time('time_of_entry');
            $table->time('time_of_return');
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
        Schema::dropIfExists('willingness');
    }
}