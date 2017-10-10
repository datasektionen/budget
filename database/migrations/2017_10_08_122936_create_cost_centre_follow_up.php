<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostCentreFollowUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_line_follow_up', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('budget_line_id')->unsigned();
            $table->integer('follow_up_id')->unsigned();
            $table->integer('booked');
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
        Schema::dropIfExists('budget_line_follow_up');
    }
}
