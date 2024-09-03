<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->date('date');
            $table->integer('area_id');
            $table->integer('member_account')->nullable();
            $table->string('branch')->nullable();
            $table->integer('voucher_id')->nullable();
            $table->integer('voucher_amount');
            $table->string('voucher_by');
            $table->string('capture')->nullable();
            $table->string('note')->nullable();
            $table->integer('status')->default(1)->nullable();

            $table->string('deleted_by')->nullable();
            $table->string('processed_by')->nullable();

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
        Schema::dropIfExists('expenses');
    }
}
