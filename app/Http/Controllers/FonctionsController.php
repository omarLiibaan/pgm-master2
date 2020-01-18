<?php

namespace App\Http\Controllers;

use App\Champs;
use App\Fonctions;
use App\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class FonctionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    public function index()
    {
        $fonctions = DB::table('champs')
            ->join('fonctions', 'champs.cha_fon_id', '=', 'fonctions.id')
            ->select('champs.cha_fon_id', 'champs.id', 'champs.cha_titre', 'champs.cha_type', 'fonctions.fon_nom' , 'fonctions.id' , 'fonctions.fon_description')
            ->groupBy('fonctions.fon_nom')
            ->get();
        //$teams = Teams::orderBy('created_at', 'desc')->paginate(5);
        return view('fonctions.index')->with('fonctions', $fonctions);
    }
    public function searchfon(Request $request)
    {
        $search = $request->get('search');
        $fonctions = DB::table('champs')
            ->join('fonctions', 'champs.cha_fon_id', '=', 'fonctions.id')
            ->select('champs.cha_fon_id', 'champs.id', 'champs.cha_titre', 'champs.cha_type', 'fonctions.fon_nom' , 'fonctions.id' , 'fonctions.fon_description')
            ->where('champs.cha_titre', 'like', '%'.$search.'%')
            ->Orwhere('fonctions.fon_description', 'like', '%'.$search.'%')
            ->Orwhere('fonctions.fon_nom', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('fonctions.index')->with('fonctions', $fonctions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonctions = array('Participant', 'Collaborateur', 'Joueur');
        return view('fonctions.create', compact( 'fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fon_nom' => 'required',
            'fon_description' => 'required',
            'inf_titre' => 'required',
            'inf_type' => 'required',
            'inf_titre2' => 'required',
        ]);

        $fonctions = new Fonctions();
        $fonctions->fon_nom = $request->get('fon_nom');
        $fonctions->fon_description = $request->get('fon_description');
        $fonctions->user_id = auth()->user()->id;
        $fonctions->save();
        $champs = new Champs();
        $champs->cha_titre = $request->get('inf_titre');
        $champs->cha_type = $request->get('inf_type');
        $cha_val = $request->get('cha_val');

        if($request->get('inf_type') === 'Champs simple'){
            $champs->cha_format = $request->get('cha_format');
        }else{
            $champs->cha_val = $cha_val;
            $champs->cha_val2 = $request->get('cha_val2');
            $champs->cha_val3 = $request->get('cha_val3');
            $champs->cha_val4 = $request->get('cha_val4');
            $champs->cha_val5 = $request->get('cha_val5');
            $champs->cha_val6 = $request->get('cha_val6');
        }
        $champs->cha_fon_id = $fonctions->id;
        $champs->save();


        $champs2 = new Champs();
        $champs2->cha_titre = $request->get('inf_titre2');
        $champs2->cha_type = $request->get('inf_type2');
        $cha_2val = $request->get('cha_2val');
        if($request->get('inf_type2') === 'Champs simple'){
            $champs2->cha_format = $request->get('cha_format2');
        }else{
            $champs2->cha_val = $cha_2val;
            $champs2->cha_val2 = $request->get('cha_2val2');
            $champs2->cha_val3 = $request->get('cha_2val3');
            $champs2->cha_val4 = $request->get('cha_2val4');
            $champs2->cha_val5 = $request->get('cha_2val5');
            $champs2->cha_val6 = $request->get('cha_2val6');
        }
        $champs2->cha_fon_id = $fonctions->id;
        $champs2->save();


        $titre3 = $request->get('inf_titre3');
        $titre4 = $request->get('inf_titre4');
        if($titre3 != null){
            $champs3 = new Champs();
            $champs3->cha_titre = $request->get('inf_titre3');
            $champs3->cha_type = $request->get('inf_type3');
            $cha_3val = $request->get('cha_3val');
            if($request->get('inf_type3') === 'Champs simple'){
                $champs3->cha_format = $request->get('cha_format3');
            }else{
                $champs3->cha_val = $cha_3val;
                $champs3->cha_val2 = $request->get('cha_3val2');
                $champs3->cha_val3 = $request->get('cha_3val3');
                $champs3->cha_val4 = $request->get('cha_3val4');
                $champs3->cha_val5 = $request->get('cha_3val5');
                $champs3->cha_val6 = $request->get('cha_3val6');
            }
            $champs3->cha_fon_id = $fonctions->id;
            $champs3->save();
        }
        if($titre4 != null){
            $champs4 = new Champs();
            $champs4->cha_titre = $request->get('inf_titre4');
            $champs4->cha_type = $request->get('inf_type4');
            $cha_4val = $request->get('cha_4val');
            if($request->get('inf_type4') === 'Champs simple'){
                $champs4->cha_format = $request->get('cha_format4');
            }else{
                $champs4->cha_val = $cha_4val;
                $champs4->cha_val2 = $request->get('cha_4val2');
                $champs4->cha_val3 = $request->get('cha_4val3');
                $champs4->cha_val4 = $request->get('cha_4val4');
                $champs4->cha_val5 = $request->get('cha_4val5');
                $champs4->cha_val6 = $request->get('cha_4val6');
            }
            $champs4->cha_fon_id = $fonctions->id;
            $champs4->save();
        }
        return redirect('fonctions');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonctions = Fonctions::find($id);
        $champs = Champs::where('cha_fon_id', $id)->get();


        //$teams = Teams::orderBy('created_at', 'desc')->paginate(5);
        return view('fonctions.show', compact('fonctions', 'champs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $champs = Champs::where('cha_fon_id', $id)->get();
        $fonctions = Fonctions::find($id);


        $type = array('Champs simple','Liste déroulante');
        $format = array('Lettres et chiffres','Chiffres uniquement', 'Dates');
        //$teams = Teams::orderBy('created_at', 'desc')->paginate(5);
        return view('fonctions.edit', compact('fonctions', 'champs', 'type', 'format'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fon_nom' => 'required',
            'fon_description' => 'required',
            'inf_titre1' => 'required',
            'inf_titre2' => 'required',
        ]);


        $champs = Champs::where('cha_fon_id', $id)->get();
        $fonctions = Fonctions::find($id);
        $fonctions->fon_nom = $request->get('fon_nom');
        $fonctions->fon_description = $request->get('fon_description');
        $fonctions->user_id = auth()->user()->id;
        $fonctions->save();


        $i = 1;
        foreach ($champs as $champ)
        {
            $champ->cha_titre = $request->get('inf_titre'.$i);
            $champs->cha_type = $request->get('inf_type'.$i);
            $cha_val = $request->get('cha_'.$i.'val');

            if($request->get('inf_type'.$i) === 'Champs simple'){
                $champs->cha_format = $request->get('cha_format'.$i);
            }else{
                $champs->cha_val = $cha_val;
                $champs->cha_val2 = $request->get('cha_'.$i.'val2');
                $champs->cha_val3 = $request->get('cha_'.$i.'val3');
                $champs->cha_val4 = $request->get('cha_'.$i.'val4');
                $champs->cha_val5 = $request->get('cha_'.$i.'val5');
                $champs->cha_val6 = $request->get('cha_'.$i.'val6');
            }
            $champ->cha_fon_id = $fonctions->id;
            $champ->save();
            $i++;
        }



        $titre3 = $request->get('inf_titre3');
        $titre4 = $request->get('inf_titre4');
        if($titre3 != null){
            $champs3 = new Champs();
            $champs3->cha_titre = $request->get('inf_titre3');
            $champs3->cha_type = $request->get('inf_type3');
            $cha_3val = $request->get('cha_3val');
            if($request->get('inf_type3') === 'Champs simple'){
                $champs3->cha_format = $request->get('cha_format3');
            }else{
                $champs3->cha_val = $cha_3val;
                $champs3->cha_val2 = $request->get('cha_3val2');
                $champs3->cha_val3 = $request->get('cha_3val3');
                $champs3->cha_val4 = $request->get('cha_3val4');
                $champs3->cha_val5 = $request->get('cha_3val5');
                $champs3->cha_val6 = $request->get('cha_3val6');
            }
            $champs3->cha_fon_id = $fonctions->id;
            $champs3->save();
        }
        if($titre4 != null){
            $champs4 = new Champs();
            $champs4->cha_titre = $request->get('inf_titre4');
            $champs4->cha_type = $request->get('inf_type4');
            $cha_4val = $request->get('cha_4val');
            if($request->get('inf_type4') === 'Champs simple'){
                $champs4->cha_format = $request->get('cha_format4');
            }else{
                $champs4->cha_val = $cha_4val;
                $champs4->cha_val2 = $request->get('cha_4val2');
                $champs4->cha_val3 = $request->get('cha_4val3');
                $champs4->cha_val4 = $request->get('cha_4val4');
                $champs4->cha_val5 = $request->get('cha_4val5');
                $champs4->cha_val6 = $request->get('cha_4val6');
            }
            $champs4->cha_fon_id = $fonctions->id;
            $champs4->save();
        }
        return redirect('fonctions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Champs::where('cha_fon_id', $id)->get()->each->delete();
        $fonctions = Fonctions::find($id);
        $fonctions->delete();
        return redirect('fonctions');
    }
}
