<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id')->unsigned();
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
            $table->string('filepath');
            $table->tinyInteger('level');
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
        if (Schema::hasColumn('images', 'poster_id')) {
            Schema::table('images', function(Blueprint $table) {
                $table->dropForeign('images_poster_id_foreign');
            });
        }
        Schema::dropIfExists('images');
    }
}
