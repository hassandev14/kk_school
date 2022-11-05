<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_salary', function (Blueprint $table) {
            Schema::rename('teacher_salary', 'teacher_salary_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_salary', function (Blueprint $table) {
            Schema::rename('teacher_salary_paid', 'teacher_salary');
        });
    }
}
