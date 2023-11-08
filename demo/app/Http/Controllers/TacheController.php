<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    //
    public function getListeTache(){
        $taches=Tache::all();
        return view("tache.taches",["taches"=>$taches]);
    }


    public function show(Request $req){

        $tache =Tache::findOrfail($req->id);
        return view("tache.show", ["tacheTrouvee"=>$tache]);
    }
}

