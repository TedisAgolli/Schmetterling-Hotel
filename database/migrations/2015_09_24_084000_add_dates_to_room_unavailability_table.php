<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesToRoomUnavailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('room_availability', function ($table) {
            $table->dateTime('startdate');
            $table->dateTime('enddate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_availability', function ($table) {
            $table->dropColumn('startdate');
            $table->dropColumn('enddate');
        });
    }
}
