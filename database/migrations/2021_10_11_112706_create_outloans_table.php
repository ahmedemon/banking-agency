<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outloans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('mobile');
            $table->string('company');
            $table->string('profession');
            $table->integer('balance')->nullable();
            $table->integer('interest')->nullable();
            $table->string('address');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('outloans');
    }
}
