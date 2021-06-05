<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marchand;
use Illuminate\Support\Arr;
use Hash;

class MarchandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marchands = Marchand::latest()->paginate(5);
        return view('marchand.index', compact('marchands'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marchand.create');
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
            'nom_marchand' => 'required',
            'prenom_marchand' => 'required',
            'CIN' => 'required|unique:marchands',
            'tel' => 'required',
            'login' => 'required|unique:marchands,login',
            'password' =>'required|same:confirm-password',
            'adresse_marchand' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        Marchand::create($input);


        return redirect()->route('personne.index')
            ->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Personne $marchand
     * @return \Illuminate\Http\Response
     */
    public function show(Marchand $marchand)
    {
        return view('marchand.show', compact('marchand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Personne $marchand
     * @return \Illuminate\Http\Response
     */
    public function edit(Marchand $marchand)
    {
        return view('marchand.edit', compact('marchand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Personne $marchand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marchand $marchand)
    {
        request()->validate([
            'nom_marchand' => 'required',
            'prenom_marchand' => 'required',
            'CIN' => 'required|unique:marchands',
            'tel' => 'required',
            'login' => 'required|unique:marchands,login',
            'password' =>'same:confirm-password',
            'adresse_marchand' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $marchand->update($input);

        return redirect()->route('marchand.index')
            ->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Personne $marchand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marchand $marchand)
    {
        $marchand->delete();

        return redirect()->route('marchand.index')
            ->with('success');
    }
}
