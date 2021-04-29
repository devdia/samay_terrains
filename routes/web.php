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
    return view('welcome');
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

//Ventes Route
Route::resource('ventes', \App\Http\Controllers\VenteController::class);
