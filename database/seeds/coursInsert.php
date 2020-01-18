<?php

use Illuminate\Database\Seeder;
use App\Cours;

class coursInsert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cours::create([
            'cou_nom' => 'Salsa cubaine',
            'cou_datedebut' => Carbon::parse('2019-06-17'),
            'cou_datefin'=> Carbon::parse('2019-08-17'),
            'user_id'=> 1,
        ]);
    }

}
