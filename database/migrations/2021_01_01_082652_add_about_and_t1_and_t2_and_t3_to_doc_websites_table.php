<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutAndT1AndT2AndT3ToDocWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_websites', function (Blueprint $table) {
          $table->string('about');
          $table->string('t1');
          $table->string('t2');
          $table->string('t3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_websites', function (Blueprint $table) {
          $table->dropColumn('about');
          $table->dropColumn('t1');
          $table->dropColumn('t2');
          $table->dropColumn('t3');
        });
    }
}
