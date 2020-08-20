<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookingInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekdays', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('status');
        });
        Schema::create('durations', function (Blueprint $table) {
            $table->id();
            $table->string('duration');
            $table->string('status');
        });
        Schema::create('timings', function (Blueprint $table) {
            $table->id();
            $table->string('start_time');
            $table->string('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
