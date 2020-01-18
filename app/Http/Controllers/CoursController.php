<?php

namespace App\Http\Controllers;

use App\Cotisations;
use App\Seances;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cours;
use Illuminate\Support\Facades\DB;

class CoursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::orderBy('created_at', 'desc')->paginate(5);

        return view('cours.index')->with('cours', $cours);
    }

    public function searchcours(Request $request)
    {
        $search = $request->get('search');
        $cours = DB::table('cours')
            ->where('cou_nom', 'like', '%'.$search.'%')
            ->Orwhere('cou_datedebut', 'like', '%'.$search.'%')
            ->Orwhere('cou_datefin', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('cours.index')->with('cours', $cours);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lieu = array('Salle communale de Meyrin', 'La becassière', 'Salle du Liothard', 'Vernier','CO du renard');
        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi','Vendredi', 'Samedi', 'Dimanche');
        return view('cours.create', compact( 'jours', 'lieu'));
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
            'cou_nom' => 'required',
            'cou_datedebut' => 'required|date',
            'cou_datefin' => 'required|date|after:cou_datedebut',
            'sea_jour' => 'required',
            'sea_heureDebut' => 'required',
            'sea_heureFin' => 'required|after:sea_heureDebut',
            'sea_lieu' => 'required',
            'sea_jour2' => 'required',
            'sea_heureDebut2' => 'required',
            'sea_heureFin2' => 'required|after:sea_heureDebut2',
            'sea_lieu2' => 'required',
            'cot_somme' => 'required',
            'cot_nbPaiement' => 'required',
            'cot_echeance' =>'required',
        ]);
        $cours = new Cours();
        $cours->cou_nom = $request->get('cou_nom');
        $cours->cou_datedebut = $request->get('cou_datedebut');
        $cours->cou_datefin = $request->get('cou_datefin');
        $cours->user_id = auth()->user()->id;
        $cours->save();

        $seances = new Seances();
        $seances->sea_jours = $request->get('sea_jour');
        $seances->sea_heureDebut = $request->get('sea_heureDebut');
        $seances->sea_heureFin = $request->get('sea_heureFin');
        $seances->sea_lieu = $request->get('sea_lieu');
        $seances->sea_cou_id = $cours->id;
        $seances->save();

        $seances2 = new Seances();
        $seances2->sea_jours = $request->get('sea_jour2');
        $seances2->sea_heureDebut = $request->get('sea_heureDebut2');
        $seances2->sea_heureFin = $request->get('sea_heureFin2');
        $seances2->sea_lieu = $request->get('sea_lieu2');
        $seances2->sea_cou_id = $cours->id;
        $seances2->save();

        $coti = new Cotisations();
        $coti ->cot_somme = $request->get('cot_somme');
        $coti ->cot_nbPaiement = $request->get('cot_nbPaiement');
        $jours = $request->get('cot_echeance');
        //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
        $datetime = new Carbon( $cours->cou_datedebut);;
        $cotiEcheance =$datetime->addDays($jours);
        $coti ->cot_echeance = $cotiEcheance;
        $coti->cot_cou_id = $cours->id;
        $coti->save();

        $jour3 = $request->get('sea_jour3');
        $jour4 = $request->get('sea_jour4');

        if($jour3 != null){
            $seances3 = new Seances();
            $seances3->sea_jours = $request->get('sea_jour3');
            $seances3->sea_heureDebut = $request->get('sea_heureDebut3');
            $seances3->sea_heureFin = $request->get('sea_heureFin3');
            $seances3->sea_lieu = $request->get('sea_lieu3');
            $seances3->sea_cou_id = $cours->id;
            $seances3->save();
        }
        if($jour4 != null){
            $seances4 = new Seances();
            $seances4->sea_jours = $request->get('sea_jour4');
            $seances4->sea_heureDebut = $request->get('sea_heureDebut4');
            $seances4->sea_heureFin = $request->get('sea_heureFin4');
            $seances4->sea_lieu = $request->get('sea_lieu4');
            $seances4->sea_cou_id = $cours->id;
            $seances4->save();
        }

        return redirect('coursAsso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cours = Cours::find($id);
        $cotis = Cotisations::where('cot_cou_id', $id)->get();
        $seances = Seances::where('sea_cou_id', $id)->get();
        return view('cours.show', compact('cours', 'cotis', 'seances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cours = Cours::find($id);
        $cotis = Cotisations::where('cot_cou_id', $id)->get();
        $seances = Seances::where('sea_cou_id', $id)->get();
        return view('cours.edit', compact('cours', 'cotis', 'seances'));
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
            'cou_nom' => 'required',
            'cou_datedebut' => 'required',
            'cou_datefin' => 'required|after:cou_datedebut',
            'sea_jour1' => 'required',
            'sea_heureDebut1' => 'required',
            'sea_heureFin1' => 'required|after:sea_heureDebut1',
            'sea_lieu1' => 'required',
            'sea_jour2' => 'required',
            'sea_heureDebut2' => 'required',
            'sea_heureFin2' => 'required|after:sea_heureDebut2',
            'sea_lieu2' => 'required',
            'cot_somme' => 'required',
            'cot_nbPaiement' => 'required',
            'cot_echeance' =>'required',
        ]);
        $wesh = 'bien';
        $cours = Cours::find($id);
        $cotis = Cotisations::where('cot_cou_id', $id)->get();
        $seances = Seances::where('sea_cou_id', $id)->get();

        $cours->cou_nom = $request->get('cou_nom');
        $cours->cou_datedebut = $request->get('cou_datedebut');
        $cours->cou_datefin = $request->get('cou_datefin');
        $cours->user_id = auth()->user()->id;
        $cours->save();
        $i = 1;
        foreach ($seances as $seance)
        {
            $seance->sea_jours = $request->get('sea_jour'.$i);
            $seance->sea_heureDebut = $request->get('sea_heureDebut'.$i);
            $seance->sea_heureFin = $request->get('sea_heureFin'.$i);
            $seance->sea_lieu = $request->get('sea_lieu'.$i);
            $seance->save();
            $i++;
        }
        foreach ($cotis as $coti)
        {
            $coti ->cot_somme = $request->get('cot_somme');
            $coti ->cot_nbPaiement = $request->get('cot_nbPaiement');
            $jours = $request->get('cot_echeance');
            //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
            $datetime = new Carbon( $cours->cou_datedebut);;
            $cotiEcheance =$datetime->addDays($jours);
            $coti ->cot_echeance = $cotiEcheance;
            $coti->save();
        }


        $jour3 = $request->get('sea_jour3');
        $jour4 = $request->get('sea_jour4');
        if($jour3 != null){
            $seances3 = new Seances();
            $seances3->sea_jours = $request->get('sea_jour3');
            $seances3->sea_heureDebut = $request->get('sea_heureDebut3');
            $seances3->sea_heureFin = $request->get('sea_heureFin3');
            $seances3->sea_lieu = $request->get('sea_lieu3');
            $seances3->sea_cou_id = $cours->id;
            $seances3->save();
        }
        if($jour4 != null){
            $seances4 = new Seances();
            $seances4->sea_jours = $request->get('sea_jour4');
            $seances4->sea_heureDebut = $request->get('sea_heureDebut4');
            $seances4->sea_heureFin = $request->get('sea_heureFin4');
            $seances4->sea_lieu = $request->get('sea_lieu4');
            $seances4->sea_cou_id = $cours->id;
            $seances4->save();
        }

        return redirect('coursAsso');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Cotisations::where('cot_cou_id', $id)->get()->each->delete();
        Seances::where('sea_cou_id', $id)->get()->each->delete();
        $cours = Cours::find($id);
        $cours->delete();
        return redirect('coursAsso');
    }
}
