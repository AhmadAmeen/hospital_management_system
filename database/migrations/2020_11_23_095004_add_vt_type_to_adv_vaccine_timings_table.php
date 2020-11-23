<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVtTypeToAdvVaccineTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adv_vaccine_timings', function (Blueprint $table) {
          $table->string('vt_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adv_vaccine_timings', function (Blueprint $table) {
          $table->dropColumn('vt_type');
        });
    }
}
