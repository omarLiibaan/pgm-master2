<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cats;
use Illuminate\Support\Facades\DB;

class CatsController extends Controller
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
        $cats = Cats::orderBy('created_at', 'desc')->paginate(5);
        return view('cats.index')->with('cats', $cats);
    }
    public function searchcats(Request $request)
    {
        $search = $request->get('search');
        $cats = DB::table('cats')
            ->where('cat_nom', 'like', '%'.$search.'%')
            ->Orwhere('cat_dateDebutEntre', 'like', '%'.$search.'%')
            ->Orwhere('cat_sexe', 'like', '%'.$search.'%')
            ->paginate(5);
        return view('cats.index')->with('cats', $cats);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cats.create');
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
            'cat_nom' => 'required',
            'cat_description' => 'required',
            'cat_dateDebutEntre' => 'required',
            'cat_dateFinEntre' => 'required',
        ]);
        $cats = new Cats();
        $cats->cat_nom = $request->get('cat_nom');
        $cats->cat_description = $request->get('cat_description');
        $cats->cat_dateDebutEntre = $request->get('cat_dateDebutEntre');
        $cats->cat_dateFinEntre = $request->get('cat_dateFinEntre');
        $cats->cat_sexe = $request->get('my_checkbox');
        $cats->user_id = auth()->user()->id;
        $cats->save();
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Cats::find($id);
        return view('cats.show', compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Cats::find($id);
        return view('cats.edit', compact('cats'));
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
            'cat_nom' => 'required',
            'cat_description' => 'required',
            'cat_dateDebutEntre' => 'required',
            'cat_dateFinEntre' => 'required',
        ]);
        $cats = Cats::find($id);
        $cats->cat_nom = $request->get('cat_nom');
        $cats->cat_description = $request->get('cat_description');
        $cats->cat_dateDebutEntre = $request->get('cat_dateDebutEntre');
        $cats->cat_dateFinEntre = $request->get('cat_dateFinEntre');
        $cats->cat_sexe = $request->get('my_checkbox');
        $cats->save();
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Cats::find($id);
        $cats->delete();
        return redirect('categories');
    }
}
