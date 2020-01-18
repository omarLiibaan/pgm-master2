<?php

namespace App\Http\Controllers;

use App\Cats;
use App\Cotisations;
use App\Saisons;
use App\Seances;
use App\Teams;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
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
        $teams = DB::table('teams')
            ->join('saisons', 'teams.tea_sai_id', '=', 'saisons.id')
            ->join('cats', 'teams.tea_cat_id', '=', 'cats.id')
            ->select('teams.*', 'saisons.sai_nomCategorie', 'cats.cat_nom')
            ->get();
        //$teams = Teams::orderBy('created_at', 'desc')->paginate(5);
        return view('teams.index')->with('teams', $teams);
    }
    public function searchteam(Request $request)
    {
        $search = $request->get('search');
        $teams = DB::table('teams')
            ->join('saisons', 'teams.tea_sai_id', '=', 'saisons.id')
            ->join('cats', 'teams.tea_cat_id', '=', 'cats.id')
            ->select('teams.*', 'saisons.sai_nomCategorie', 'cats.cat_nom')
            ->where('sai_nomCategorie', 'like', '%'.$search.'%')
            ->Orwhere('tea_nom', 'like', '%'.$search.'%')
            ->Orwhere('cat_nom', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('teams.index')->with('teams', $teams);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cats::orderBy('created_at', 'desc')->paginate(5);
        $saisons = Saisons::orderBy('created_at', 'desc')->paginate(5);
        $jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi','Vendredi', 'Samedi', 'Dimanche');
        return view('teams.create', compact( 'cats', 'saisons', 'jours'));
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
            'tea_nom' => 'required',
            'sea_jour' => 'required',
            'sea_heureDebut' => 'required',
            'sea_heureFin' => 'required|after:sea_heureDebut',
            'sea_lieu' => 'required',
            'sea_jour2' => 'required',
            'sea_heureDebut2' => 'required',
            'sea_heureFin2' => 'required|after:sea_heureDebut',
            'sea_lieu2' => 'required',
            'cot_somme' => 'required',
            'cot_nbPaiement' => 'required',
            'cot_echeance' =>'required',
        ]);

        $teams = new Teams();
        $teams->tea_nom = $request->get('tea_nom');
        $teams->tea_sai_id = $request->get('tea_sai_id');
        dd($request->get('tea_sai_id'));
        $teams->tea_cat_id = $request->get('tea_cat_id');
        $teams->user_id = auth()->user()->id;
        $teams->save();
        $seances = new Seances();
        $seances->sea_jours = $request->get('sea_jour');
        $seances->sea_heureDebut = $request->get('sea_heureDebut');
        $seances->sea_heureFin = $request->get('sea_heureFin');
        $seances->sea_lieu = $request->get('sea_lieu');
        $seances->sea_tea_id = $teams->id;
        $seances->save();

        $seances2 = new Seances();
        $seances2->sea_jours = $request->get('sea_jour2');
        $seances2->sea_heureDebut = $request->get('sea_heureDebut2');
        $seances2->sea_heureFin = $request->get('sea_heureFin2');
        $seances2->sea_lieu = $request->get('sea_lieu2');
        $seances2->sea_tea_id = $teams->id;
        $seances2->save();

        $coti = new Cotisations();
        $coti ->cot_somme = $request->get('cot_somme');
        $coti ->cot_nbPaiement = $request->get('cot_nbPaiement');
        $saisonDate = Saisons::find($teams->tea_sai_id);
        $dateDebut = $saisonDate->sai_dateDebut;

        $jours = $request->get('cot_echeance');
        //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
        $datetime = new Carbon( $dateDebut);;
        $cotiEcheance =$datetime->addDays($jours);
        $coti ->cot_echeance = $cotiEcheance;
        $coti->cot_tea_id = $teams->id;
        $coti->save();

        $jour3 = $request->get('sea_jour3');
        $jour4 = $request->get('sea_jour4');
        if($jour3 != null){
            $seances3 = new Seances();
            $seances3->sea_jours = $request->get('sea_jour3');
            $seances3->sea_heureDebut = $request->get('sea_heureDebut3');
            $seances3->sea_heureFin = $request->get('sea_heureFin3');
            $seances3->sea_lieu = $request->get('sea_lieu3');
            $seances3->sea_tea_id = $teams->id;
            $seances3->save();
        }
        if($jour4 != null){
            $seances4 = new Seances();
            $seances4->sea_jours = $request->get('sea_jour4');
            $seances4->sea_heureDebut = $request->get('sea_heureDebut4');
            $seances4->sea_heureFin = $request->get('sea_heureFin4');
            $seances4->sea_lieu = $request->get('sea_lieu4');
            $seances4->sea_tea_id = $teams->id;
            $seances4->save();
        }

        return redirect('equipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teams = DB::table('teams')
            ->join('saisons', 'teams.tea_sai_id', '=', 'saisons.id')
            ->join('cats', 'teams.tea_cat_id', '=', 'cats.id')
            ->select('teams.*', 'saisons.sai_nomCategorie', 'cats.cat_nom')
            ->where('teams.id', '=', $id)
            ->get();
        $cotis = Cotisations::where('cot_tea_id', $id)->get();
        $seances = Seances::where('sea_tea_id', $id)->get();
        return view('teams.show', compact('teams', 'cotis', 'seances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Teams::find($id);
        $cotis = Cotisations::where('cot_tea_id', $id)->get();
        $seances = Seances::where('sea_tea_id', $id)->get();
        $cats = Cats::orderBy('created_at', 'desc')->paginate(5);
        $saisons = Saisons::orderBy('created_at', 'desc')->paginate(5);
        return view('teams.edit', compact('teams', 'cotis', 'seances', 'cats', 'saisons'));
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
            'tea_nom' => 'required',
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


        $cotis = Cotisations::where('cot_tea_id', $id)->get();
        $seances = Seances::where('sea_tea_id', $id)->get();
        $team = Teams::find($id);
        $team->tea_nom = $request->get('tea_nom');
        $team->tea_sai_id = $request->get('tea_sai_id');
        $team->tea_cat_id = $request->get('tea_cat_id');
        $team->user_id = auth()->user()->id;
        $team->save();

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
            $saisonDate = Saisons::find($team->tea_sai_id);
            $dateDebut = $saisonDate->sai_dateDebut;
            $jours = $request->get('cot_echeance');
            //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
            $datetime = new Carbon( $dateDebut);;
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
            $seances3->sea_tea_id = $team->id;
            $seances3->save();
        }
        if($jour4 != null){
            $seances4 = new Seances();
            $seances4->sea_jours = $request->get('sea_jour4');
            $seances4->sea_heureDebut = $request->get('sea_heureDebut4');
            $seances4->sea_heureFin = $request->get('sea_heureFin4');
            $seances4->sea_lieu = $request->get('sea_lieu4');
            $seances4->sea_tea_id = $team->id;
            $seances4->save();
        }

        return redirect('equipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cotisations::where('cot_tea_id', $id)->get()->each->delete();
        Seances::where('sea_tea_id', $id)->get()->each->delete();
        $teams = Teams::find($id);
        $teams->delete();
        return redirect('equipes');
    }
}
