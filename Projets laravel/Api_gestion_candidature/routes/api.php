<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UsersFormation;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\Api\FormationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    // :sanctum
    return $request->user();
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::post('me',[AuthController::class,'me']);

});
// gestion de la formation
Route::get('formations',[FormationController::class,'index']);
Route::post('formations/create',[FormationController::class,'store']);
Route::put('formations/edit/{formation}',[FormationController::class,'update']);
Route::delete('formations/{formation}',[FormationController::class,'delete']);

// gestion de la candidature(UsersFormation)
Route::get('candidatures',[CandidatureController::class,'index']);
Route::post('candidatures/create/{id}',[CandidatureController::class,'store'])->middleware('auth:api');
Route::put('candidatures/edit/{candidature}/{id}',[CandidatureController::class,'update']);
Route::delete('candidatures/{candidature}',[CandidatureController::class,'delete']);
