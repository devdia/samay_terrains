<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Regions Controller
Route::resource('regions', \App\Http\Controllers\RegionController::class);

//Departements Controller
Route::resource('departements', \App\Http\Controllers\DepartementController::class);

//Titre Controller
Route::resource('titres', \App\Http\Controllers\TitreController::class);

//Terrains Route
Route::resource('terrains', \App\Http\Controllers\TerrainController::class);
Route::get('terrain/edit/{id}', [\App\Http\Controllers\TerrainController::class, 'edit'])
    ->name('terrain.edit');
Route::post('terrain/modifier', [\App\Http\Controllers\TerrainController::class, 'update'])
    ->name('terrain.update');

//Ventes Route
Route::resource('ventes', \App\Http\Controllers\VenteController::class);
Route::get('ventes', [\App\Http\Controllers\VenteController::class, 'index'])->name('ventes.index');
Route::get('terrain/vendre/{id}', [\App\Http\Controllers\VenteController::class, 'create'])->name('ventes.create');


//Localiser Terrain
Route::get('terrain/localiser/{id}', [\App\Http\Controllers\VenteController::class, 'localiser'])->name('ventes.localiser');


// map
Route::get('map', [\App\Http\Controllers\TerrainController::class, 'map'])->name('terrains.map');


//Route Utilisateurs
Route::resource('utilisateurs', \App\Http\Controllers\UtilisateurController::class);
Route::get('utilisateur/delete/{id}', [\App\Http\Controllers\UtilisateurController::class, 'destroy']);
Route::post('utilisateur/modifier', [\App\Http\Controllers\UtilisateurController::class, 'update'])
    ->name('utilisateur.modifier');

//Store data from json file
//Route::get('get-file', [\App\Http\Controllers\StoreDataController::class, 'createData']);
//Route::post('store-data', [\App\Http\Controllers\StoreDataController::class, 'storeData'])->name('data.store');

