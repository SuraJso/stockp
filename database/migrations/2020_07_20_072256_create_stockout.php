<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockout', function (Blueprint $table) {
            $table->id('stockout_id');
            $table->unsignedBigInteger('pd_id');
            $table->integer('stockout_count');
            $table->decimal('stockout_price',20,2);
            $table->date('stockout_date');
            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('usr_id')->on('users');
            $table->timestamps();
        });
        Schema::table('stockout', function (Blueprint $table) {
            $table->foreign('pd_id')->references('pd_id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockout');
    }
}
