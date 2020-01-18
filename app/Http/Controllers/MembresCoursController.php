<?php

namespace App\Http\Controllers;

use App\Cotisations;
use App\Cours;
use App\Factures;
use App\Member;
use App\MembresCours;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembresCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' =>['index', 'show']]);
    }

    public function index()
    {
        $membres_cours = DB::table('membres_cours')
            ->join('cours', 'membres_cours.mc_cou_id', '=', 'cours.id')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->select('cours.cou_nom', DB::raw('count(*) as memId'), 'mc_cou_id')
            ->groupBy('cours.cou_nom')
            ->get();

        //$teams = Teams::orderBy('created_at', 'desc')->paginate(5);
        return view('membresCours.index')->with('membres_cours', $membres_cours);
       /* $membres_cours = MembresCours::all();
        $cours = Cours::class;
        foreach ($membres_cours as $membres_cour)
        {
           // dd($membres_cour->mc_cou_id);

            $cours = Cours::where('id', $membres_cour->mc_cou_id)->groupBy('cou_nom')->get();
            $membres = Member::where('id', $membres_cour->mc_mem_id)->get();
            $membresCount = count($membres);



            return view('membresCours.index', compact('membres', 'cours', 'membres_cours', 'membresCount'));
            //dd($membresCount);
        }*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $membres = Member::where('mem_fonction', 'Joueur')->get();
        $cours = Cours::orderBy('created_at', 'desc')->paginate(5);
        return view('membresCours.create', compact('membres', 'cours'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $membres = $request->input('mem_id');
        $membresAtt = Member::find($membres);
        $couId = $request->get('cou_id');
        $cotis = Cotisations::where('cot_cou_id', $couId)->get();
        $cours = Cours::find($couId);
       // dd($membresAtt->mem_prenom);

        foreach ($membres as $membre){
            $membresCours = new MembresCours();
            $membresCours->mc_cou_id = $couId;
            $membresCours->mc_mem_id = $membre;
            $membresAtt = Member::find($membre);
            $membresCours->save();
            $factures = new Factures();
            $factures->fac_numero = 'FAC'.$couId.'s'.$membre;
            $factures->fac_titre = $cours->cou_nom;
            $factures->fac_destinataire = $membresAtt->mem_prenom.' '.$membresAtt->mem_nom;
            $factures->fac_dateCreation = Carbon::today();
            foreach ($cotis as $coti){
                $factures->fac_dateEcheance = $coti->cot_echeance;
                $factures->fac_montant = $coti->cot_somme;
            }
            $factures->fac_moyenPayement = 'Virement bancaire';
            $factures->fac_statut = 'Aucun';
            $factures->save();
        }


        return redirect('membresCours');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membres_cours = DB::table('membres_cours')
            ->join('cours', 'membres_cours.mc_cou_id', '=', 'cours.id')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->select('cours.cou_nom', DB::raw('count(*) as memId'), 'mc_cou_id', 'members.mem_nom', 'members.mem_prenom')
            ->where('mc_cou_id', $id)
            ->groupBy('cours.cou_nom')
            ->get();
       //
        $membres = DB::table('membres_cours')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->select('mc_cou_id', 'members.mem_nom', 'members.mem_prenom')
            ->where('mc_cou_id', $id)
            ->get();
        //dd($membres);
        return view('membresCours.show',compact('membres', 'membres_cours'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membres_cours = MembresCours::where('mc_cou_id', $id)->delete();


        return redirect('membresCours');
    }
}
