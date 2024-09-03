<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings_balances', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->unique()->nullable();
            $table->foreignId('savings_id')->references('id')->on('savings');
            $table->date('date')->default(today());
            $table->integer('deposit')->nullable();
            $table->integer('withdraw')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('penalty')->nullable(); //fine
            $table->string('note')->nullable();
            $table->string('processed_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('savings_balances');
    }
}
