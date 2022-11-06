<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuudentFeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fee', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('student_id');
            $table->string('fee');
            $table->foreign('student_id')->references('id')->on('students');
            $table->date('apply_date');
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
        Schema::dropIfExists('student_fee');
    }
}
