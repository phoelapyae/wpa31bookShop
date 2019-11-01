<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('price');
            $table->integer('page');
            $table->text('review');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('publisher_id')->unsigned();
            $table->string('mime');
            $table->string('original_filename');
            $table->string('filename');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
