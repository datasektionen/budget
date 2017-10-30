<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValidityBudgetLine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('budget_lines', function (Blueprint $table) {
            $table->enum('type', ['internal', 'external'])->default('internal');
            $table->datetime('valid_from')->nullable();
            $table->datetime('valid_to')->nullable();
            $table->integer('suggestion_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('budget_lines', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('valid_from');
            $table->dropColumn('valid_to');
            $table->dropColumn('suggestion_id');
        });
    }
}
