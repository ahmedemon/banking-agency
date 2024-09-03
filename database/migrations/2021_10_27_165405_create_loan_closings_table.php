<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanClosingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_closings', function (Blueprint $table) {
            $table->id();

            $table->integer('account');
            // $table->integer('loan_id');

            $table->date('closing_date');
            $table->integer('penalty')->nullable();
            $table->decimal('percent'); // in decimal
            $table->decimal('discount'); // in percent
            $table->integer('collect'); // in integer
            $table->string('note')->nullable();

            $table->string('processed_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_at')->nullable();

            $table->timestamps();

            $table->foreign('account')->references('account')->on('members');
            $table->foreignId('loan_id')->references('id')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_closings');
    }
}
