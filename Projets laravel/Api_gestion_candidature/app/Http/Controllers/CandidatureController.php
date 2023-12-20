<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use App\Models\Formation;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\AccepteCandidature;
use App\Http\Requests\EditCandidatureRequest;
use App\Http\Requests\CreateCandidatureRequest;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'Bonjour';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCandidatureRequest $request,$id) 
    {
        //
        // dd($id);
        try {
            $formation =Formation::findOrFail($id);
            
            $user= Auth::guard('api')->user();
            $candidature = new Candidature();
            
            $candidature->formation_id=$formation->id;
            $candidature->user_id=$user->id;
            $candidature->save();

            if($candidature->status="accepter"){
                $userMail=User::find($user->id);
                $userMail->notify(new AccepteCandidature());
            }
            return response()->json([
                'status_code'=>200,
                'status_message'=>'La candidature a été bien effectué',
                'data'=>$candidature
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCandidatureRequest $request,Candidature $candidature,$id)
    {
        //
        try{    
            $formation =Formation::findOrFail($id);
            $user= Auth::guard('api')->user();
            $candidature->formation_id=$formation->id;
            $candidature->user_id=$user->id;
            $candidature->save();

            if($candidature->status="accepter"){
                $userMail=User::find($user->id);
                $userMail->notify(new AccepteCandidature());
            }
            return response()->json([
                "status_code"=>200,
                "status_messages"=>"La Candidature a ete Modifié",
                "data"=>$formation
                ]);
            }catch(Exception $e){
    
             response()->json($e);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Candidature $candidature)
    {
        //
        try{    
            $candidature->delete();

            return response()->json([
                "status_code"=>200,
                "status_messages"=>"La Candidature a ete Supprimé",
                "data"=>$candidature
                ]);

            }catch(Exception $e){
    
             response()->json($e);

            }
    }
}
