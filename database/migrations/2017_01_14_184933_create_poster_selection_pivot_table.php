<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterSelectionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_selection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('poster_id')->unsigned();
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade');
            $table->integer('selection_id')->unsigned();
            $table->foreign('selection_id')->references('id')->on('selections')->onDelete('cascade');
            $table->smallInteger('order');
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
        Schema::dropIfExists('poster_selection');
    }
}
