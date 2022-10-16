<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('employe_name',255);
        $table->string('father_name',255);
        $table->integer('phone');
        $table->string('address',255)->nullable();
        $table->float('salary',10,2);
        $table->string('image_name',255)->nullable();
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
        Schema::dropIfExists('employes');
    }
}
