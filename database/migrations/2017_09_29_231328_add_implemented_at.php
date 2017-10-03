<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImplementedAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggestions', function (Blueprint $table) {
            $table->timestamp('implemented_at')->nullable();
            $table->integer('implemented_by')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suggestions', function (Blueprint $table) {
            $table->dropColumn('implemented_at');
            $table->dropColumn('implemented_by');
        });
    }
}
