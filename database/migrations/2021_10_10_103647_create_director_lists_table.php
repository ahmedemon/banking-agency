<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('director_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('mobile');
            $table->string('designation');
            $table->string('profession');
            $table->integer('balance');
            $table->string('address');
            $table->boolean('active');
            $table->string('biography');
            $table->string('post');
            $table->boolean('publish');
            $table->string('director_photo');
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
        Schema::dropIfExists('director_lists');
    }
}
