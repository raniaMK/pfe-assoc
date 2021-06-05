<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;

class PersonneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:personne-list|personne-create|personne-edit|personne-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:personne-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:personne-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:personne-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $personnes = Personne::latest()->paginate(5);
        return view('personne.index', compact('personnes'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personne.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'CIN' => 'required|unique:personnes,CIN',
            'date_naiss' => 'required',
            'tel' => 'required',
            'adresse' => 'required',
            'Situation_Fam' => 'required',
            'nb_enfants' => 'required'
        ]);


        Personne::create($request->all());


        return redirect()->route('personne.index')
            ->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function show(Personne $personne)
    {
        return view('personne.show', compact('personne'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function edit(Personne $personne)
    {
        return view('personne.edit', compact('personne'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personne $personne)
    {

        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'CIN' => 'required|unique:personnes',
            'date_naiss' => 'required',
            'tel' => 'required',
            'adresse' => 'required',
            'Situation_Fam' => 'required',
            'nb_enfants' => 'required'
        ]);

        $personne->update($request->all());

        return redirect()->route('personne.index')
            ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Personne $personne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personne $personne)
    {
        $personne->delete();

        return redirect()->route('personne.index')
            ->with('success');
    }
}
