<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            // $table->integer('voucher_category_id');
            $table->uuid('voucher_code')->nullable();
            $table->string('reason')->nullable();
            $table->integer('credit')->nullable();
            $table->integer('debit')->nullable();
            $table->integer('voucher_by')->nullable();
            $table->timestamps();

            $table->foreignId('voucher_category_id')->references('id')->on('voucher_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
