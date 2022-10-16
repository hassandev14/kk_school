<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('expense_name');
            $table->string('expense_detail',255);
            $table->unsignedInteger('employe_id');
            $table->unsignedInteger('category_id');
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('expense_amount',255);
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
        Schema::dropIfExists('expenses');
    }
}
