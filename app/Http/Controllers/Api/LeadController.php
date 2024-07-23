<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//aggiungo Validator e Mail(Facade),Lead(Model) e NewContact(Mail)
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;
use App\Mail\NewContact;

class LeadController extends Controller
{
    //creo la rotta store per recuperare i dati tramite chiamata API
    public function store(Request $request){
        //salvo i dati in una variabile
        $data=$request->all();

        /*valido i dati tramite il Validator con funzione make
        (due argomenti, uno è la variabile con i dati salvati,
        il secondo è array con i dati da validare, facendo attenzione che le chiavi combacino sempre con i name nel form lato front-end)
        */
        $validator=Validator::make($data,[
            'name'=>'required|min:2',
            'email'=>'required|mail',
            'description'=>'required|max:300',
        ]);
        /*pongo controllo sulla variabile $validator:se non supera il controllo,
         la chiamata API restituirà false alla voce 'success'
        */
        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'errors'=>$validator->errors(),
            ]);
        }
        //creo una nuova Lead
        $n_lead=new Lead();
        //la farcisco con i dati 
        $n_lead->fill($data);
        //salvo i dati 
        $n_lead->save();
        //spedisco la mail            // send ha come argomento una nuova istanza di NewContact con argomento $n_lead
        Mail::to('info@marlene.com')->send(new NewContact($n_lead));

    }
}
