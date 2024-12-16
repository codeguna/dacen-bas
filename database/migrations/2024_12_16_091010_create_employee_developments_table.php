<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_developments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('speaker');
            $table->string('event_organizer');
            $table->string('place');
            $table->char('price');
            $table->integer('event_type_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('employee_developments');
    }
}
