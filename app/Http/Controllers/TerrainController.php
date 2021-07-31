<?php

namespace App\Http\Controllers;

use App\Models\Coordonate;
use App\Models\Departement;
use App\Models\Region;
use App\Models\Terrain;
use App\Models\Titre;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrains = Terrain::where(['statut' => true])->get();
        return view('terrains.index', compact('terrains'));
    }

    public function map(){
        $titres = Titre::all();
        $regions = Region::all();

        $terrains = Terrain::where(['statut' => true])->with('coordonate')->get();
        $terrainsVendus = Terrain::where(['statut' => false])->with('coordonate')->get();


        return view('terrains.map', compact('titres', 'regions', 'terrains', 'terrainsVendus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terrains.create');
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
            'departement' => 'required',
            'titre' => 'required',
            'numero' => 'required',
            'superficie' => 'required'
        ]);

        $coord = new Coordonate();
        $coord->longitude = $request->lng;
        $coord->latitude = $request->lat;
        $coord->save();

        $terrain = new Terrain();
        $terrain->numero = $request->numero;
        $terrain->superficie = $request->superficie;
        $terrain->titre_id = $request->titre;
        $terrain->departement_id = $request->departement;
        $terrain->coordonate_id = $coord->id;
        $terrain->commune = $request->commune;
        $terrain->adresse = $request->adresse;
        $terrain->observation = $request->observation;
        $terrain->date_achat = $request->date;
        $terrain->cout = $request->cout;
        $terrain->statut = true;
        $terrain->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $terrain = Terrain::find($id);
        return view('terrains.show', compact('terrain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terrain = Terrain::find($id);

        $regions = Region::all();
        $titres = Titre::all();
        return view('terrains.edit', compact('terrain', 'regions', 'titres'));
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
            'departement' => 'required',
            'titre' => 'required',
            'numero' => 'required',
            'superficie' => 'required',
            'longitude' => ['regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'latitude' => ['regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']

        ]);

        $terrain = Terrain::find($request->terrain);
        $terrain->numero = $request->numero;
        $terrain->superficie = $request->superficie;
        $terrain->titre_id = $request->titre;
        $terrain->departement_id = $request->departement;
        $terrain->commune = $request->commune;
        $terrain->adresse = $request->adresse;
        $terrain->observation = $request->observation;
        $terrain->date_achat = $request->date;
        $terrain->cout = $request->cout;



        if ($terrain->coordonate_id == 2){
            $coord = new Coordonate();
            $coord->latitude = $request->latitude;
            $coord->longitude = $request->longitude;
            $coord->save();
            $terrain->coordonate_id = $coord->id;

        }

        $terrain->save();

        return redirect()->route('terrains.index');

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
