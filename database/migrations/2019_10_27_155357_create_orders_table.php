<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('shop_id')->unsigned();
            $table->integer('number');
            $table->string('customer');
            $table->text('phone');
            $table->text('address');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('shop_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
