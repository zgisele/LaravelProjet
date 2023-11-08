<?php

use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/taches', function () {
//     return view('tache.taches');
// });

Route::get('/taches/{id}/details',[TacheController::class,'show'] ); 
Route::get('/taches',[TacheController::class,'getListeTache'] ); 
Route::get('/tache/terminer/{id}',[TacheController::class,'terminer'] ); 
