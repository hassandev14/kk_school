<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('today_attendence');
            $table->date('date');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('my_classes');
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
        Schema::dropIfExists('attendence');
    }
}
