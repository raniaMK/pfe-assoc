<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Cheque;
use Illuminate\Support\Arr;
use Hash;

class ChequeController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cheques = Cheque::all();

        //dd($result);
        return view('cheque.index',compact('cheques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = Personne::all();
        return view('cheque.create',compact('result'));
        //return view('');
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
            'numero' => 'required',
            'montant' => 'required',
            'validité' => 'required',
            'personne_id'=>'required'
        ]);
        $input = $request->all();
        // dd( $input);
        Cheque::create($input);

        //var_dump( $input);
        return redirect()->route('cheque.index')->with('info', 'Le coupon a bien été créé');

    }
    /**
     * Display the specified resource.
     *
     * @param \App\Cheque $cheques
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $cheque = Cheque::where('id', $id)->firstOrFail();
        $personne = $cheque->personne->nom;
        //return view('coupon.show')->with('coupon', $coupon);
        return view('cheque.show', compact('cheque', 'personne'));

    }

}
