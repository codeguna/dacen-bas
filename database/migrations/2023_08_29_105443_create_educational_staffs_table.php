<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nip');
            $table->string('name');
            $table->integer('department_id')->unsigned();
            $table->date('date_of_entry');
            $table->boolean('status');
            $table->text('id_card')->nullable();
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
        Schema::dropIfExists('educational_staffs');
    }
}