<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_purchase');
            $table->date('retired_date');
            $table->integer('asset_in_year');
            $table->string('category');
            $table->string('branch');
            $table->string('item_name');
            $table->integer('condition');
            $table->string('description');
            $table->integer('product_cost');
            $table->integer('model_number');
            $table->boolean('warrenty_gurentee');
            $table->integer('asset_in_month');
            $table->string('supplier_name');
            $table->boolean('dept_type');
            $table->decimal('percent');
            $table->integer('serial');
            $table->string('capture');
            $table->integer('manual_number');
            $table->string('vou_scan_copy');
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
        Schema::dropIfExists('assets');
    }
}
