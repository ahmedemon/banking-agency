<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixedDipositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_diposits', function (Blueprint $table) {
            $table->id();
            $table->integer('account');
            $table->foreign('account')->references('account')->on('members')->delete();
            // $table->integer('scheme_id');
            $table->foreignId('scheme_id')->references('id')->on('fixed_diposit_schemes')->delete();
            $table->date('starting_date');
            $table->date('ending_date');
            $table->tinyInteger('months');
            $table->integer('amount');
            $table->decimal('percent');
            $table->string('note')->nullable();
            $table->string('capture')->nullable();
            $table->string('capture2')->nullable();
            $table->string('cheque')->nullable();
            $table->tinyInteger('status')->default('1');

            $table->string('processed_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixed_diposits');
    }
}
