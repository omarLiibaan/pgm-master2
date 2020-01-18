<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Seances;
use App\Cotisations;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturesCoursController extends Controller
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
        return view('facturesCours.index')->with('cours', $cours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $membres = DB::table('membres_cours')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->select('mc_cou_id', 'members.*')
            ->where('mc_cou_id', $id)
            ->get();
        //dd($membres);
        return view('facturesCours.show',compact('membres','cours'));
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
        Cotisations::where('cot_cou_id', $id)->get()->each->delete();
        Seances::where('sea_cou_id', $id)->get()->each->delete();
        $cours = Cours::find($id);
        $cours->delete();
        return redirect('coursAsso');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFacture($id)
    {
        $membres_cours = DB::table('membres_cours')
            ->join('cours', 'membres_cours.mc_cou_id', '=', 'cours.id')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->join('cotisations','cours.id','=','cotisations.cot_cou_id')
            ->select('cours.*', 'members.*', 'cours.cou_nom', 'membres_cours.mc_mem_id', 'membres_cours.mc_cou_id', 'cotisations.cot_cou_id', 'cotisations.*', 'members.id  AS memId')
            ->where('members.id', $id)
            ->get();
        //dd($membres_cours);

        /*
         * select members.*, cours.cou_nom, membres_cours.mc_mem_id, membres_cours.mc_cou_id, cotisations.cot_cou_id, cotisations.cot_somme FROM members JOIN membres_cours ON members.id = membres_cours.mc_mem_id join cours ON membres_cours.mc_cou_id = cours.id JOIN cotisations on cours.id = cotisations.cot_cou_id where membres_cours.mc_mem_id = 2
         *
         *
         */
        //set_time_limit(0);
        //$pdf = PDF::loadView('facturesCours.facture',compact('membres_cours'));
     //   $pdfreturn = $pdf->stream('facture.pdf');
        //$this->pdf($membres_cours);
        return view('facturesCours.facture',compact('membres_cours'));
        //return view('facturesCours.facture');
    }

    public function pdf($id){

        $membres_cours = DB::table('membres_cours')
            ->join('cours', 'membres_cours.mc_cou_id', '=', 'cours.id')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->join('cotisations','cours.id','=','cotisations.cot_cou_id')
            ->select('cours.*', 'members.*', 'cours.cou_nom', 'membres_cours.mc_mem_id', 'membres_cours.mc_cou_id', 'cotisations.cot_cou_id', 'cotisations.*', 'members.id  AS memId')
            ->where('members.id', $id)
            ->get();

        $pdf = PDF::loadView('facturesCours.pdf',['membres_cours' => $membres_cours]);
        return $pdf->stream('facturesCours.pdf', array('Attachment'=>0));
        //$pdf->download('facturesCours.pdf');
        //return view('facturesCours.pdf', compact('membres_cours','pdf'));

    }

    public function pdfCours($id){

        $membres_cours = DB::table('membres_cours')
            ->join('cours', 'membres_cours.mc_cou_id', '=', 'cours.id')
            ->join('members', 'membres_cours.mc_mem_id', '=', 'members.id')
            ->join('cotisations','cours.id','=','cotisations.cot_cou_id')
            ->select('cours.*','cours.id  AS couId', 'members.*', 'cours.cou_nom', 'membres_cours.mc_mem_id', 'membres_cours.mc_cou_id', 'cotisations.cot_cou_id', 'cotisations.*', 'members.id  AS memId')
            ->where('cours.id', $id)
            ->get();

        $pdf = PDF::loadView('facturesCours.pdf',['membres_cours' => $membres_cours]);
        return $pdf->stream('facturesCours.pdf', array('Attachment'=>0));
        //$pdf->download('facturesCours.pdf');
        //return view('facturesCours.pdf', compact('membres_cours','pdf'));

    }
}
