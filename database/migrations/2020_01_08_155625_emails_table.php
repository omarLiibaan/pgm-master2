<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *             'ema_titre' => 'required',
    'ema_dateJour' => 'required|date',
    'ema_lieu' => 'required',
    'ema_intro' => 'required',
    'ema_descriptif' => 'required',
    'ema_p' => 'required',
    'ema_salutations' => 'required',
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('ema_titre');
            $table->dateTime('ema_dateJour');
            $table->mediumText('ema_lieu');
            $table->mediumText('ema_intro');
            $table->mediumText('ema_descriptif');
            $table->longText('ema_p');
            $table->longText('ema_p2')->default(null)->nullable(true);
            $table->mediumText('ema_salutations');
            $table->mediumText('ema_mail');
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
