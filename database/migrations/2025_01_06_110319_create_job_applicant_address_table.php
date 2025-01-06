<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicantAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applicant_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_applicant_id')->unsigned();
            $table->string('address');
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->string('city');
            $table->char('postal_code',5);
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
        Schema::dropIfExists('job_applicant_address');
    }
}
