<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockin', function (Blueprint $table) {
            $table->id('stockin_id');
            $table->unsignedBigInteger('pd_id');
            $table->integer('stockin_count');
            $table->decimal('stockin_price',20,2);
            $table->date('stockin_date');
            $table->unsignedBigInteger('usr_id');
            $table->foreign('usr_id')->references('usr_id')->on('users');
            $table->timestamps();
        });
        Schema::table('stockin', function (Blueprint $table) {
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
        Schema::dropIfExists('stockin');
    }
}
