<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOeuvre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oeuvre', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title_ov');
            $table->string('title_en');
            $table->string('title_fr');
            $table->string('year');
            $table->string('active')->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oeuvre');
    }
}
