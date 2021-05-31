<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailAtbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail_atbs', function (Blueprint $table) {
            $table->integer('bill_detail_id')->unsigned();
            $table->integer('attribute_value_id')->unsigned();
            $table->primary(['bill_detail_id', 'attribute_value_id']);
            $table->foreign('bill_detail_id')->references('id')->on('bill_details');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values');
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
        Schema::dropIfExists('bill_detail_atbs');
    }
}
