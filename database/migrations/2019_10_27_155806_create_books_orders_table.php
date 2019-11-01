<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_orders', function (Blueprint $table) {
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('order_id');
            $table->timestamps();

            $table->unique(['book_id','order_id']);
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_orders');
    }
}
