<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimingindaysAndVtTypeAndVnameToVaccinationHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vaccination_histories', function (Blueprint $table) {
          $table->string('timingindays');
          $table->string('vt_type');
          $table->string('vname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vaccination_histories', function (Blueprint $table) {
          $table->dropColumn('timingindays');
          $table->dropColumn('vt_type');
          $table->dropColumn('vname');
        });
    }
}
