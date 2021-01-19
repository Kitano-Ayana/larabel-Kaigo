<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConditionToConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conditions', function (Blueprint $table) {
            //
            $table->string('weight')->after('comment');
            $table->string('high_pressure')->after('weight');
            $table->string('low_pressure')->after('high_pressure');
            $table->boolean('toilet')->after('low_pressure');
            $table->boolean('medicine')->after('toilet');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conditions', function (Blueprint $table) {
            //
        });
    }
}
