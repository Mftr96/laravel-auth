<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
   public function index(){
    return response()->json([
        'success'=>true,
        /*per passare le relazionemany to many e one to many scrivo
         funzione with() con argomento array con dentro in forma di
          stringa, i nomi delle funzioni che ho nei modelli */
        'projects'=>Project::with(['type','tecnologies'])->orderbyDesc('id')->paginate()    
    ]);
   }
   //creo funzione show che vada a recuperare il singolo progetto da mostrare poi lato front-end
   //nella show devo passare come argomento l'id del progetto che viene usato nella funzione where
   public function show($id){
     /*recupero un Progetto 
      (funzione with serve per recuperare tecnologies
       dalla many to many)*/                                   //prende solo il primo risultato
       $project=Project::with('tecnologies')->where('id',$id)->first();
    /*bonus:aggiungo la condizione che richieda che esista 
    il progetto in chiamata, in caso contrario viene dato false a success per mandare poi alla 
    pagina NotFound
    */
      if ($project) {
        return response()->json([
            'success' => true,
            'project' => $project
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'not found'
        ]);
    }
    
   }

}

