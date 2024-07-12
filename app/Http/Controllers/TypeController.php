<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        $data = [
            "tipi" => $types
        ];
        //creare cartella type in views con file index 
        return view("admin.types.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //sono i dati che attivano dal form
        $data = $request->validate([
            "name" => "required|min:5|max:50",
            "description" => "required|min:10|max:200",
            "icon" => "required",
        ]);
        $newType = new Type();
        $newType->fill($data);
        dump($data);
        /*controlla che in questa funzione ci siano tutti i dati:
                se lasci dei dati che hanno un valore predefinito,
                assegna quel valore nella funzione */
        $newType->save();
        return redirect()->route('admin.types.show', ['type' => $newType]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $data = [
            'type' => $type
        ];
        return view('admin.types.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();

        $type->name = $data['name'];
        $type->description = $data['description'];
        $type->creation_date = $data['creation_date'];

        $type->save();

        return redirect()->route('project.show', ['project' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        dd($type);
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
