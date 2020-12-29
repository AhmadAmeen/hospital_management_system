<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExHeadSizeAndExLengthAndExWeightToVisitHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_histories', function (Blueprint $table) {
          $table->string('ex_head_size');
          $table->string('ex_length');
          $table->string('ex_weight');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_histories', function (Blueprint $table) {
          $table->dropColumn('ex_head_size');
          $table->dropColumn('ex_length');
          $table->dropColumn('ex_weight');
        });
    }
}
