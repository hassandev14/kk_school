<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAttendenceCoulmn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendence', function (Blueprint $table) {

        $table->string('today_attendence')->change();
        $table->string('today_date')->change();
        $table->unsignedInteger('class_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendence', function (Blueprint $table) {
        $table->dropColumn('today_attendence');
        $table->dropColumn('today_date');
        $table->dropColumn('class_id');
        });
    }
}
