<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScanLogsExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scan_logs_extra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pin');
            $table->string('scan');
            $table->boolean('verify');
            $table->boolean('status_scan');
            $table->string('ip_scan');
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
        Schema::dropIfExists('scan_logs_extra');
    }
}