<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalStaffEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_staff_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('educational_staff_id')->unsigned();
            $table->foreign('educational_staff_id')->references('id')->on('educational_staffs')->onDelete('cascade');
            $table->integer('level_id')->unsigned();
            $table->integer('study_program_id')->unsigned();
            $table->integer('university_id')->unsigned();
            $table->integer('knowledge_id')->unsigned();
            $table->text('certificate');
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
        Schema::dropIfExists('educational_staff_educations');
    }
}