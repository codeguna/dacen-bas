<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDevelopmentMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_development_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_developments_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('certificate_attachment');
            $table->timestamps();

            $table->foreign('employee_developments_id')
                ->references('id')
                ->on('employee_developments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_development_members');
    }
}
