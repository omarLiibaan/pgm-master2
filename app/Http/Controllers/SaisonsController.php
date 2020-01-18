<?php

namespace App\Http\Controllers;

use App\Saisons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaisonsController extends Controller
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
        $saisons = Saisons::orderBy('created_at', 'desc')->paginate(5);
        return view('saisons.index')->with('saisons', $saisons);
    }
    public function searchsai(Request $request)
    {
        $search = $request->get('search');
        $saisons = DB::table('saisons')
            ->where('sai_nomCategorie', 'like', '%'.$search.'%')
            ->Orwhere('sai_dateDebut', 'like', '%'.$search.'%')
            ->Orwhere('sai_dateFin', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('saisons.index')->with('saisons', $saisons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saisons.create');
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
            'sai_nomCategorie' => 'required',
            'sai_dateDebut' => 'required',
            'sai_dateFin' => 'required',
        ]);
        $saison = new Saisons();
        $saison->sai_nomCategorie = $request->get('sai_nomCategorie');
        $saison->sai_dateDebut = $request->get('sai_dateDebut');
        $saison->sai_dateFin = $request->get('sai_dateFin');
        $saison->save();
        return redirect('saisons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saison = Saisons::find($id);
        return view('saisons.show', compact('saison'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saison = Saisons::find($id);
        return view('saisons.edit', compact('saison'));
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
            'sai_nomCategorie' => 'required',
            'sai_dateDebut' => 'required',
            'sai_dateFin' => 'required',
        ]);
        $saison = Saisons::find($id);
        $saison->sai_nomCategorie = $request->get('sai_nomCategorie');
        $saison->sai_dateDebut = $request->get('sai_dateDebut');
        $saison->sai_dateFin = $request->get('sai_dateFin');
        $saison->save();
        return redirect('saisons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saison = Saisons::find($id);
        $saison->delete();
        return redirect('saisons');
    }
}
