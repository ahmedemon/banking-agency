<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedDipositProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_diposit_profits', function (Blueprint $table) {
            $table->id();
            // $table->integer('fdr_id');
            $table->foreignId('fdr_id')->references('id')->on('fixed_diposits');
            $table->integer('profit')->nullable();
            $table->integer('withdraw')->nullable();
            $table->integer('month');
            $table->integer('year');
            $table->date('date');

            $table->string('processed_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_diposit_profits');
    }
}
