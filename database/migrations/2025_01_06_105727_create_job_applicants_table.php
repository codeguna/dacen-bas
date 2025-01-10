<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_vacancies_id')->unsigned();
            $table->string('full_name');
            $table->string('front_title')->nullable();
            $table->string('back_title');
            $table->tinyInteger('gender');
            $table->string('born_place');
            $table->string('born_date');
            $table->date('date_of_application');
            $table->char('level');
            $table->string('university');
            $table->string('major');
            $table->string('university_base');
            $table->char('graduation_year',4);
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
        Schema::dropIfExists('job_applicants');
    }
}
