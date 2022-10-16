<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('student_class_id');
            $table->string('fee',255);
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('student_class_id')->references('id')->on('my_classes');
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
        Schema::dropIfExists('student_classes');
    }
}
