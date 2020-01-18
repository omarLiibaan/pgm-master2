<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('sea_jours');
            $table->time('sea_heureDebut');
            $table->time('sea_heureFin');
            $table->mediumText('sea_lieu');
            $table->integer('sea_cou_id')->default(null)->nullable(true);
            $table->integer('sea_tea_id')->default(null)->nullable(true);
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
        Schema::dropIfExists('seances');
    }
}
