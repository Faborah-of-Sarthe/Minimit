<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeAndExternalIdOeuvres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oeuvres', function (Blueprint $table) {
            $table->integer('type')->default(1);
            $table->integer('external_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oeuvres', function (Blueprint $table) {
            $table->dropColumn('type')->default(1);
            $table->dropColumn('external_id')->default(0);
        });
    }
}
