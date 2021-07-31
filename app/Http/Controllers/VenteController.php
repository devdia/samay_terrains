<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Vente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('success_message')){
            Alert::success('Réussi', session('success_message'));
        }
        $ventes = Vente::all();
        return view('ventes.index', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $terrain = Terrain::find($id);
        return view('ventes.create', compact('terrain'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'acquereur' => 'required',
            'vendeur' => 'required',
            'date' => 'required',
            'prix' => 'required',
            'commission' => 'required'
        ]);


        $vente = new Vente();
        $vente->acquereur = $request->acquereur;
        $vente->vendeur = $request->vendeur;
        $vente->date = $request->date;
        $vente->prix = $request->prix;
        $vente->commission = $request->commission;
        $vente->terrain_id = $request->terrain;
        $vente->save();

        $terrain = Terrain::find($request->terrain);
        $terrain->statut = false;
        $terrain->save();

        return redirect()->route('ventes.index')->withSuccessMessage('La vente de terrain a été enregistré avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vente = Vente::find($id);
        $terrain = $vente->terrain;
        return view('ventes.show', compact('vente', 'terrain'));
    }

    public function localiser($id){
        $terrain = Terrain::with('coordonate')->find($id);
        //return $terrain;
        return view('terrains.localiser', compact('terrain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vente = Vente::find($id);
        return view('ventes.edit', compact('vente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'acquereur' => 'required',
            'vendeur' => 'required',
            'date' => 'required',
            'prix' => 'required',
            'commission' => 'required'
        ]);

        $vente = Vente::find($request->vente);
        $vente->acquereur = $request->acquereur;
        $vente->vendeur = $request->vendeur;
        $vente->date = $request->date;
        $vente->prix = $request->prix;
        $vente->commission = $request->commission;

        $vente->save();

        return redirect()->route('ventes.index')->withSuccessMessage('La vente de terrain a été modifié avec succès');
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
