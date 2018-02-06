<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostersImagesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('image_poster', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('image_id')->unsigned();
//            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
//            $table->integer('poster_id')->unsigned();
//            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
//            $table->smallInteger('order');
//            $table->timestamps();
//        });
//        Schema::table('images', function (Blueprint $table) {
//            $table->dropForeign('poster_id');
//            $table->dropColumn('poster_id');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('image_poster');
//        Schema::table('images', function (Blueprint $table) {
//            $table->integer('poster_id')->unsigned()->nullable();
//        });
    }
}
