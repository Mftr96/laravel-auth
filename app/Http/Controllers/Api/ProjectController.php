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
}
