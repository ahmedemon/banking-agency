<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->date('join')->nullable();
            $table->string('name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->bigInteger('nid')->length(17)->nullable();
            $table->string('gender')->nullable();
            $table->string('mobile')->length(14)->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('picture')->nullable();
            $table->string('sign')->nullable();
            $table->tinyInteger('publish')->nullable();
            $table->tinyInteger('user_role')->nullable();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('branch')->nullable();
            $table->boolean('active')->nullable();
            $table->string('interview')->nullable();
            $table->integer('security_money')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('house')->nullable();
            $table->integer('medical')->nullable();
            $table->integer('convenience')->nullable();
            $table->integer('transport')->nullable();
            $table->integer('mobile_bill')->nullable();
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
        Schema::dropIfExists('staffs');
    }
}
