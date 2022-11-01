<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_salary', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('teacher_id');
            $table->string('month');
            $table->string('year');
            $table->string('method');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->date('pay_date');
            $table->string('status');
            $table->string('image_name');
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
        Schema::dropIfExists('teacher_salary');
    }
}
