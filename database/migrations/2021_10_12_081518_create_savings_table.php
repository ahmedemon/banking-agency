<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->unique()->nullable();
            $table->foreignId('scheme_id')->references('id')->on('savings_schemes');
            $table->integer('account_id');
            $table->foreign('account_id')->references('account')->on('members');
            $table->date('start_date');
            $table->string('opening_charge')->nullable();
            $table->integer('start_after')->nullable();
            $table->integer('ledger_no')->nullable();
            $table->integer('installment'); // number of installment
            $table->integer('savings_amount'); // installment amount
            $table->integer('interest_percent'); // in percent
            $table->integer('penalty')->nullable(); //fine for late payment
            $table->date('expire_date');
            $table->boolean('holiday');
            $table->tinyInteger('status')->default();

            $table->softDeletes();
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
        Schema::dropIfExists('savings');
    }
}
