<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $cvPath = $request->file('cv')->storeAs(
                'cvs',
                $request->nom.'_'.$request->prenom.time().'_cv.pdf', // Renommer le fichier
                'public'
            );


        Inscription::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'profession' => $request->input('profession'),
            'nationalite' => $request->input('nationalite'),
            'naissance' => $request->input('naissance'),
            'genre' => $request->input('genre'),
            'telephone' => $request->input('telephone'),
            'residence' => $request->input('residence'),
            'region' => $request->input('region'),
            'prefecture' => $request->input('prefecture'),
            'localite' => $request->input('localite'),
            'motivation' => $request->input('motivation'),
            'experience' => $request->input('experience'),
            'attentes' => $request->input('attentes'),
            'contribution' => $request->input('contribution'),
            'activity_id' => $request->input('activity_id'),
            'cv'=>$cvPath
        ]);
        // dd($request);

        return back()->with('message','Soumission du formulaire réussi');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
