<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('mem_etatcompte')->default(null)->nullable(true);
            $table->mediumText('mem_etatfinance')->default(null)->nullable(true);
            $table->mediumText('mem_nom');
            $table->mediumText('mem_prenom');
            $table->mediumText('mem_sexe');
            $table->dateTime('mem_datenaissance');
            $table->longText('mem_adresse');
            $table->integer('mem_npa');
            $table->mediumText('mem_localite');
            $table->mediumText('mem_pays');
            $table->mediumText('mem_numeroportable');
            $table->mediumText('mem_numfixe')->default(null)->nullable(true);
            $table->mediumText('mem_nomparent')->default(null)->nullable(true);
            $table->mediumText('mem_prenomparent')->default(null)->nullable(true);
            $table->mediumText('mem_numparent')->default(null)->nullable(true);
            $table->mediumText('mem_email');
            $table->mediumText('mem_numlicense')->default(null)->nullable(true);
            $table->dateTime('mem_entredate');
            $table->mediumText('statut');
            $table->mediumText('mem_fonction');
            $table->integer('user_id');

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
        Schema::dropIfExists('members');
    }
}
