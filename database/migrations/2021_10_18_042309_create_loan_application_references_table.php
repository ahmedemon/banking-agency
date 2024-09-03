<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_application_references', function (Blueprint $table) {
            $table->id();
            // reference no 1
            $table->integer('ref1_nid_no')->nullable();
            $table->string('ref1_name')->nullable();
            $table->string('ref1_profession')->nullable();
            $table->integer('ref1_have_previous_loan')->nullable();
            $table->integer('ref1_releation')->nullable();
            $table->integer('ref1_mobile_no')->nullable();
            $table->integer('ref1_quranted_sign')->nullable();
            // reference no 1

            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('loan_application_references');
    }
}
