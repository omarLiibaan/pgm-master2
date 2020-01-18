<?php

namespace App\Http\Controllers;

use App\Cotisations;
use App\Evenements;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class EventsController extends Controller
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
        $events = Evenements::orderBy('created_at', 'desc')->paginate(5);
        return view('evenements.index')->with('events', $events);
    }
    public function searchevent(Request $request)
    {
        $search = $request->get('search');
        $events = DB::table('evenements')
            ->where('eve_nom', 'like', '%'.$search.'%')
            ->Orwhere('eve_datedebut', 'like', '%'.$search.'%')
            ->Orwhere('eve_datefin', 'like', '%'.$search.'%')
            ->Orwhere('eve_lieu', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('evenements.index')->with('events', $events);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evenements.create');
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
            'eve_nom' => 'required',
            'eve_datedebut' => 'required',
            'eve_datefin' => 'required|date|after:eve_datedebut',
            'eve_horairedebut' => 'required',
            'eve_horairefin' => 'required|after:eve_horairedebut',
            'cot_somme' => 'required',
            'cot_nbPaiement' => 'required',
            'cot_echeance' =>'required',
        ]);
        $events = new Evenements();
        $events->eve_nom = $request->get('eve_nom');
        $events->eve_datedebut = $request->get('eve_datedebut');
        $events->eve_datefin = $request->get('eve_datefin');
        $events->eve_horairefin = $request->get('eve_horairefin');
        $events->eve_horairedebut = $request->get('eve_horairedebut');
        $events->eve_lieu = $request->get('eve_lieu');
        $events->user_id = auth()->user()->id;
        $events->save();

        $coti = new Cotisations();
        $coti ->cot_somme = $request->get('cot_somme');
        $coti ->cot_nbPaiement = $request->get('cot_nbPaiement');
        $jours = $request->get('cot_echeance');
        //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
        $datetime = new Carbon($events->eve_datedebut);;
        $cotiEcheance =$datetime->addDays($jours);
        $coti ->cot_echeance = $cotiEcheance;
        $coti->cot_eve_id = $events->id;
        $coti->save();

        return redirect('evenements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $events = Evenements::find($id);
        $cotis = Cotisations::where('cot_eve_id', $id)->get();
        return view('evenements.show', compact('events', 'cotis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Evenements::find($id);
        $cotis = Cotisations::where('cot_eve_id', $id)->get();
        return view('evenements.edit', compact('events', 'cotis'));
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
            'eve_nom' => 'required',
            'eve_datedebut' => 'required',
            'eve_datefin' => 'required|after:eve_datedebut',
            'eve_horairedebut' => 'required',
            'eve_horairefin' => 'required|after:eve_horairedebut',
            'cot_somme' => 'required',
            'cot_nbPaiement' => 'required',
            'cot_echeance' =>'required',
        ]);

        $events = Evenements::find($id);
        $cotis = Cotisations::where('cot_eve_id', $id)->get();


        $events->eve_nom = $request->get('eve_nom');
        $events->eve_datedebut = $request->get('eve_datedebut');
        $events->eve_datefin = $request->get('eve_datefin');
        $events->eve_horairefin = $request->get('eve_horairefin');
        $events->eve_horairedebut = $request->get('eve_horairedebut');
        $events->eve_lieu = $request->get('eve_lieu');
        $events->user_id = auth()->user()->id;
        $events->save();

        foreach ($cotis as $coti)
        {
            $coti ->cot_somme = $request->get('cot_somme');
            $coti ->cot_nbPaiement = $request->get('cot_nbPaiement');
            $jours = $request->get('cot_echeance');
            //$time = Carbon::parse('$events->eve_datedebut')->format('d M Y');
            $datetime = new Carbon($events->eve_datedebut);;
            $cotiEcheance =$datetime->addDays($jours);
            $coti ->cot_echeance = $cotiEcheance;
            $coti->save();
        }

        return redirect('evenements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cotisations::where('cot_eve_id', $id)->get()->each->delete();
        $events = Evenements::find($id);
        $events->delete();
        return redirect('evenements');
    }
}
