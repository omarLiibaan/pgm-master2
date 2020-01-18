<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Member;

class membersInsert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'mem_etatcompte' => null,
            'mem_etatfinance' => null,
            'mem_nom' => 'Santos Da Silva',
            'mem_prenom' => 'Joel',
            'mem_sexe' => 'Homme',
            'mem_datenaissance' => Carbon::parse('1994-01-01'),
            'mem_adresse' => 'Rue de la servette',
            'mem_npa' => 1203,
            'mem_localite' => 'Genève',
            'mem_pays' => 'Suisse',
            'mem_numeroportable' => '0784561245',
            'mem_numfixe' => null,
            'mem_nomparent' => null,
            'mem_prenomparent' => null,
            'mem_numparent' => null,
            'mem_email' => 'joel@gmail.com',
            'mem_numlicense' => '000002',
            'mem_entredate' => Carbon::parse('2019-06-18'),
            'statut' => 'Actif',
            'user_id'=> 1,
        ]);
        Member::create([
            'mem_etatcompte' => null,
            'mem_etatfinance' => null,
            'mem_nom' => 'OMAR',
            'mem_prenom' => 'Liibaan',
            'mem_sexe' => 'Homme',
            'mem_datenaissance' => Carbon::parse('1993-05-23'),
            'mem_adresse' => 'Rte des Fayards 274',
            'mem_npa' => 1290,
            'mem_localite' => 'Versoix',
            'mem_pays' => 'Suisse',
            'mem_numeroportable' => '0789475881',
            'mem_numfixe' => null,
            'mem_nomparent' => null,
            'mem_prenomparent' => null,
            'mem_numparent' => null,
            'mem_email' => 'omar.liibaan@gmail.com',
            'mem_numlicense' => '000001',
            'mem_entredate' => Carbon::parse('2019-06-18'),
            'statut' => 'Actif',
            'user_id'=> 1,
        ]);
        Member::create([
            'mem_etatcompte' => null,
            'mem_etatfinance' => null,
            'mem_nom' => 'Araneta',
            'mem_prenom' => 'Justin',
            'mem_sexe' => 'Homme',
            'mem_datenaissance' => Carbon::parse('1992-02-14'),
            'mem_adresse' => 'Rue des Coqlicots 13',
            'mem_npa' => 1214,
            'mem_localite' => 'Vernier',
            'mem_pays' => 'Suisse',
            'mem_numeroportable' => '0789462136',
            'mem_numfixe' => null,
            'mem_nomparent' => null,
            'mem_prenomparent' => null,
            'mem_numparent' => null,
            'mem_email' => 'justinrae13@gmail.com',
            'mem_numlicense' => '000002',
            'mem_entredate' => Carbon::parse('2019-06-18'),
            'statut' => 'Actif',
            'user_id'=> 1,
        ]);

    }



}
