<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;

class StoreDataController extends Controller
{
    public function createData(){
        $path = 'C:\Users\amadou-daouda.dia\terrains.json';

        return view('store_data_from_file', compact('path'));
    }

    public function storeData(Request $request){
        $path = $request->path;
        $datas = json_decode(file_get_contents($path), true);

        foreach ($datas as $data){
            if ($data['TypeTitre'] == 'Délibération'){
                $terrain = new Terrain();
                $terrain->numero = $data['numéro'];
                $terrain->superficie = $data['surface'];
                $terrain->observation = $data['Observations'];
                $terrain->titre_id = 1;
                $terrain->date_achat = $data['Date Achat'];
                $terrain->cout = $data['Cout Total'];


            }

        }
    }
}
