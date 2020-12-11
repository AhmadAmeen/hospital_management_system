<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalVisitHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_visit_histories', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('date');
            $table->string('head_size');
            $table->string('length');
            $table->string('weight');
            $table->string('temperature');
            $table->string('v_type');
            $table->string('medicine');
            $table->string('dosage');
            $table->string('note');

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
        Schema::dropIfExists('final_visit_histories');
    }
}
