<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('pd_id');
            $table->string('pd_name');
            $table->integer('pd_count');
            $table->unsignedBigInteger('pdt_id');
            $table->timestamps();
        });

        Schema::table('product', function (Blueprint $table) {
            $table->foreign('pdt_id')->references('pdt_id')->on('typeproduct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
