<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeeacherSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_salary', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('teacher_id');
            $table->string('salary');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('teachers_salary');
    }
}
