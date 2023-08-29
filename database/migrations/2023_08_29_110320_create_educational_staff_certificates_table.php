<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationalStaffCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_staff_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('educational_staff_id')->unsigned();
            $table->foreign('educational_staff_id')->references('id')->on('educational_staffs')->onDelete('cascade');
            $table->integer('certificate_types_id')->unsigned();
            $table->date('certificate_date');
            $table->string('note');
            $table->text('certificate_attachment');
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
        Schema::dropIfExists('educational_staff_certificates');
    }
}