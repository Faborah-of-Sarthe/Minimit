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
        Schema::create('image_poster', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->integer('poster_id')->unsigned();
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
            $table->smallInteger('order');
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_poster_id_foreign');
            $table->dropColumn('poster_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumns('image_poster', ['poster_id', 'image_id'])) {
            Schema::table('image_poster', function (Blueprint $table) {
                $table->dropForeign('image_poster_image_id_foreign');
                $table->dropForeign('image_poster_poster_id_foreign');
            });
        }

        if (Schema::hasTable('image_poster')){
            Schema::drop('image_poster');
        }

        Schema::table('images', function (Blueprint $table) {
            $table->integer('poster_id')->unsigned()->nullable();
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
        });
    }
}
