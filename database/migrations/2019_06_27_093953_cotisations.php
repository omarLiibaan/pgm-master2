<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cotisations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('cot_somme');
            $table->integer('cot_nbPaiement');
            $table->dateTime('cot_echeance');
            $table->integer('cot_cou_id')->default(null)->nullable(true);
            $table->integer('cot_tea_id')->default(null)->nullable(true);
            $table->integer('cot_eve_id')->default(null)->nullable(true);
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
