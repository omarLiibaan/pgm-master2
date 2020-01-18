<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Factures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('fac_numero');
            $table->mediumText('fac_titre');
            $table->mediumText('fac_destinataire');
            $table->dateTime('fac_dateCreation');
            $table->dateTime('fac_dateEcheance');
            $table->mediumText('fac_montant');
            $table->dateTime('fac_datePaiement');
            $table->mediumText('fac_moyenPayement');
            $table->mediumText('fac_statut');
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
