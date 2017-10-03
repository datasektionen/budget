<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepetitionsToCostCentre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cost_centres', function (Blueprint $table) {
            $table->integer('repetitions')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cost_centres', function (Blueprint $table) {
            $table->dropColumn('repetitions');
        });
    }
}
