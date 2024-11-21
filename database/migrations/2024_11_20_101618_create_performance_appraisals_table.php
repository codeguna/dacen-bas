<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_appraisals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pin')->unsigned();
            $table->char('period',2);
            $table->char('year',4);            
            $table->char('late_total');
            $table->char('pure_pa');
            $table->char('contribution');
            $table->string('note');
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
        Schema::dropIfExists('performance_appraisals');
    }
}
