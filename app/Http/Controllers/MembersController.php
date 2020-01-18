<?php

namespace App\Http\Controllers;

use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
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
        $members = Member::orderBy('created_at', 'asc')->paginate(5);
        return view('members.index')->with('members', $members);
    }

    public function searchmem(Request $request)
    {
        $search = $request->get('search');
        $members = DB::table('members')
            ->where('mem_nom', 'like', '%'.$search.'%')
            ->Orwhere('mem_prenom', 'like', '%'.$search.'%')
            ->Orwhere('mem_datenaissance', 'like', '%'.$search.'%')
            ->Orwhere('mem_adresse', 'like', '%'.$search.'%')
            ->Orwhere('mem_npa', 'like', '%'.$search.'%')
            ->Orwhere('mem_localite', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('members.index')->with('members', $members);
    }

    public function sortAsc(Request $request)
    {
        dd('salut');
        $asc = $request->get('desc');
        $members = Member::orderBy('id', $asc)->paginate(5);
        return view('members.index')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonctions = array('Participant', 'Collaborateur', 'Joueur');
        $statut = array('Actif','Inactif');
        $pays = array('France', 'Italie', 'Autriche', 'Liechtenstein','Allemagne', 'Royaume-Uni', 'Belgique', 'Suisse');
        return view('members.create', compact( 'statut', 'pays', 'fonctions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $member = new Member();
        $majeur = $request->get('mycheckboxMajeur');
        if($majeur === 'Non'){
            $validatedData = $request->validate([
                'mem_nom' => 'required',
                'mem_prenom' => 'required',
                'mem_email' => 'required',
                'mem_numlicense' => 'required|numeric|max:7',
                'mem_entredate' => 'required',
                'mem_datenaissance' => 'required|date',
                'mem_adresse' => 'required',
                'mem_npa' => 'required|numeric|min:1000|max:95550',
                'mem_localite' => 'required',
                'mem_pays' => 'required',
                'mem_numeroportable' => 'required|numeric',
                'my_checkbox' => 'required',
                'mycheckboxMajeur' =>'required',
            ]);
            $member->mem_nom = $request->get('mem_nom');
            $member->mem_prenom = $request->get('mem_prenom');
            $member->mem_sexe = $request->get('my_checkbox');
            $member->mem_email = $request->get('mem_email');
            $member->mem_numlicense = $request->get('mem_numlicense');
            $member->mem_entredate = $request->get('mem_entredate');
            $member->statut = $request->get('statut');
            $member->mem_datenaissance = $request->get('mem_datenaissance');
            $member->mem_adresse = $request->get('mem_adresse');
            $member->mem_npa = $request->get('mem_npa');
            $member->mem_localite = $request->get('mem_localite');
            $member->mem_pays = $request->get('mem_pays');
            $member->mem_numeroportable = $request->get('mem_numeroportable');
            $member->mem_nomparent = $request->get('mem_nomparent');
            $member->mem_prenomparent = $request->get('mem_prenomparent');
            $member->mem_numparent = $request->get('mem_numparent');
            $member->mem_numfixe = $request->get('mem_numfixe');
            $member->mem_fonction = $request->get('mem_fonction');
        }else{
            $validatedData = $request->validate([
                'mem_nom' => 'required',
                'mem_prenom' => 'required',
                'mem_email' => 'required',
                'mem_numlicense' => 'required|numeric|max:7',
                'mem_entredate' => 'required',
                'mem_datenaissance' => 'required|date|before:-18 years',
                'mem_adresse' => 'required',
                'mem_npa' => 'required|numeric|min:1000|max:95550',
                'mem_localite' => 'required',
                'mem_pays' => 'required',
                'mem_numeroportable' => 'required|numeric',
                'my_checkbox' => 'required',
                'mycheckboxMajeur' =>'required',
            ]);
                $member->mem_nom = $request->get('mem_nom');
                $member->mem_prenom = $request->get('mem_prenom');
                $member->mem_sexe = $request->get('my_checkbox');
                $member->mem_email = $request->get('mem_email');
                $member->mem_numlicense = $request->get('mem_numlicense');
                $member->mem_entredate = $request->get('mem_entredate');
                $member->statut = $request->get('statut');
                $member->mem_datenaissance = $request->get('mem_datenaissance');
                $member->mem_adresse = $request->get('mem_adresse');
                $member->mem_npa = $request->get('mem_npa');
                $member->mem_localite = $request->get('mem_localite');
                $member->mem_pays = $request->get('mem_pays');
                $member->mem_numeroportable = $request->get('mem_numeroportable');
                $member->mem_fonction = $request->get('mem_fonction');
        }
        $member->user_id = auth()->user()->id;
        $member->save();
        return redirect('membres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statut = array('Actif','Inactif');
        $pays = array('France', 'Italie', 'Autriche', 'Liechtenstein','Allemagne', 'Royaume-Uni', 'Belgique', 'Suisse');
        $member = Member::find($id);
        return view('members.show', compact('member', 'statut', 'pays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fonctions = array('Participant', 'Collaborateur', 'Joueur');
        $statut = array('Actif','Inactif');
        $pays = array('France', 'Italie', 'Autriche', 'Liechtenstein','Allemagne', 'Royaume-Uni', 'Belgique', 'Suisse');
        $member = Member::find($id);
        return view('members.edit', compact('member', 'statut', 'pays', 'fonctions'));
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
        $member = Member::find($id);
        $validatedData = $request->validate([
            'mem_nom' => 'required',
            'mem_prenom' => 'required',
            'mem_email' => 'required',
            'mem_numlicense' => 'required|numeric|max:7',
            'mem_entredate' => 'required',
            'mem_datenaissance' => 'required',
            'mem_adresse' => 'required',
            'mem_npa' => 'required|numeric|min:1000|max:95550',
            'mem_localite' => 'required',
            'mem_pays' => 'required',
            'mem_numeroportable' => 'required|numeric',
        ]);
        $member->mem_nom = $request->get('mem_nom');
        $member->mem_prenom = $request->get('mem_prenom');
        $member->mem_email = $request->get('mem_email');
        $member->mem_numlicense = $request->get('mem_numlicense');
        $member->mem_entredate = $request->get('mem_entredate');
        $member->statut = $request->get('statut');
        $member->mem_datenaissance = $request->get('mem_datenaissance');
        $member->mem_adresse = $request->get('mem_adresse');
        $member->mem_npa = $request->get('mem_npa');
        $member->mem_localite = $request->get('mem_localite');
        $member->mem_pays = $request->get('mem_pays');
        $member->mem_numeroportable = $request->get('mem_numeroportable');
        $member->save();
        return redirect('membres');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members = Member::find($id);
        $members->delete();
        return redirect('membres');
    }
}
