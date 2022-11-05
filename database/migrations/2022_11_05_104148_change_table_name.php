<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_fee', function (Blueprint $table) {
            Schema::rename('student_fee', 'student_fee_paid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_fee', function (Blueprint $table) {
            Schema::rename('student_fee_paid', 'student_fee');
        });
    }
}
