<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(now());
            $table->date('expire_date');
            $table->string('scheme')->length('20');
            $table->integer('account_id');
            $table->foreign('account_id')->references('account')->on('members');
            $table->integer('loan_amount'); // principle amount
            $table->integer('percent');
            $table->integer('installment');
            // $table->integer('installment_amount');
            $table->integer('collection_start');
            $table->foreignId('category_id')->references('id')->on('loan_categories');
            $table->integer('open_fee')->nullable();
            $table->integer('insurance_fee')->nullable();
            $table->integer('penalty_capital')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('ledger_no')->nullable();
            $table->string('product')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('security_docs')->nullable();
            $table->integer('loan_duration')->nullable();
            $table->integer('reference_acc')->nullable();
            $table->foreign('reference_acc')->references('account')->on('members');
            $table->string('processed_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_at')->nullable();

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
        Schema::dropIfExists('loans');
    }
}
