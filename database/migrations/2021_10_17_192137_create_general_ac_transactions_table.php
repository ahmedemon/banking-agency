<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralAcTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_ac_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('account');
            $table->integer('deposit')->nullable();
            $table->integer('withdraw')->nullable();
            $table->integer('profit')->nullable();
            $table->string('note')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
            $table->string('processed_by')->nullable();

            $table->foreign('account')->references('account')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_ac_transactions');
    }
}
