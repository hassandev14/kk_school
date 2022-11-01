<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFeeTable extends Migration
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
            $table->unsignedInteger('class_id');
            $table->string('month');
            $table->string('year');
            $table->string('all_class_fee_data',525);
            $table->foreign('class_id')->references('id')->on('my_classes');
            $table->date('submit_date');
            $table->string('fee');
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
