<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offdays', function (Blueprint $table) {
          $table->id();
          $table->string('center_id');
          $table->string('doc_id');
          $table->string('mon');
          $table->string('tues');
          $table->string('wed');
          $table->string('thu');
          $table->string('fri');
          $table->string('sat');
          $table->string('sun');
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
        Schema::dropIfExists('offdays');
    }
}
