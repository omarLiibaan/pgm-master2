<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('cha_titre')->default(null)->nullable(true);
            $table->mediumText('cha_type')->default(null)->nullable(true);
            $table->mediumText('cha_format')->default(null)->nullable(true);
            $table->mediumText('cha_val')->default(null)->nullable(true);
            $table->mediumText('cha_val2')->default(null)->nullable(true);
            $table->mediumText('cha_val3')->default(null)->nullable(true);
            $table->mediumText('cha_val4')->default(null)->nullable(true);
            $table->mediumText('cha_val5')->default(null)->nullable(true);
            $table->mediumText('cha_val6')->default(null)->nullable(true);
            $table->integer('cha_fon_id')->default(null)->nullable(true);
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
        //
    }
}
