<?php

namespace App\Http\Controllers;

use App\Models\Tecnology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Tecnology::all();
        $data =
            [
                'tecnologie' => $techs,

            ];
        return view('tecnologies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tecnologies.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|min:5|max:50",
            "icon"=> "required",

        ]);
        $newTech = new Tecnology();
        $newTech->fill($data);
        dd($data);
        
        $newProject->save();
        return redirect()->route('tecnology.show', ['tecnology' => $newTech]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnology $tecnology)
    {
        $data = [
            'tech' => $tecnology,
        ];
        //fa riferimento a come hai chiamato la cartella con le viste, ovvero tecnologies
        return view('tecnologies.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnology $tecnology)
    {
        $data = [
            'tecnology' => $tecnology,
        ];
        //view fa riferimento alla cartella view
        return view('tecnologies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnology $tecnology)
    {
        $data = $request->all();

        $project->name= $data['name'];
        $project->icon=$data['icon'];
        $project->save();

        return redirect()->route('tecnology.show', ['tecnology'=> $tecnology] );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();
        return redirect()->route('tecnology.index');

    }
}
