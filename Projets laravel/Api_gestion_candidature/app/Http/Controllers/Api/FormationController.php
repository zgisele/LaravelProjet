<?php

namespace App\Http\Controllers\Api;
use Exception;
use App\Models\Formation;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditFormationRequest;
use App\Http\Requests\CreateFormationRequest;

class FormationController extends Controller
{
    //
    public function index()
    {
            //
            // return 'Bonjour';
            try{
                return response()->json([
                    "status_code"=>200,
                    "status_messages"=>"Les formations ont ete recuperé",
                    "data"=>Formation::all()
                ]);
            }catch(Exception $e){

                response()->json($e);

            }
    }
    public function store(CreateFormationRequest $request)
    {
        //
        
        try{    
            // dd($request);
        $formation=new Formation();
        $formation->nom=$request->nom;
        $formation->duree=$request->duree;
        $formation->date_debut=$request->date_debut;
        $formation->lieu=$request->lieu;

        $formation->save();
        return response()->json([
                    "status_code"=>200,
                    "status_messages"=>"La formation a ete Ajouter",
                    "data"=>$formation
                ]);
        }catch(Exception $e){

                 response()->json($e);
        }
        
        
    }
    public function update(EditFormationRequest $request,Formation $formation)
    {
        try{    
        // $formation=Formation::find($id);
        $formation->nom=$request->nom;
        $formation->duree=$request->duree;
        $formation->date_debut=$request->date_debut;
        $formation->lieu=$request->lieu;
        // dd($formation);
        $formation->save();
        return response()->json([
            "status_code"=>200,
            "status_messages"=>"La formation a ete Modifié",
            "data"=>$formation
            ]);
        }catch(Exception $e){

         response()->json($e);
        }
       
    }
    public function delete(Formation $formation)
    {
        // 
        try{    
            $formation->delete();

            return response()->json([
                "status_code"=>200,
                "status_messages"=>"La formation a ete Supprimé",
                "data"=>$formation
                ]);

            }catch(Exception $e){
    
             response()->json($e);

            }

    }

}
