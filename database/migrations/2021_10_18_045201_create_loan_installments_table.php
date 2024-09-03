<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_installments', function (Blueprint $table) {
            $table->id();
            // $table->integer('loan_id');
            $table->foreignId('loan_id')->references('id')->on('loans');
            $table->integer('installment_no');
            $table->date('date')->default(now());
            $table->integer('amount');
            $table->integer('penalty')->nullable();
            $table->string('note')->nullable();

            $table->string('processed_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('loan_installments');
    }
}
