<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('account');
            $table->foreign('account')->references('account')->on('members');
            $table->integer('deposit_amount')->nullable();
            $table->integer('withdraw')->nullable();
            $table->boolean('status')->default(1);
            $table->string('posted_by')->nullable();
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
        Schema::dropIfExists('current_accounts');
    }
}
