<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogo = Project::all();
        $data =
            [
                'catalogo' => $catalogo,

            ];
        return view('project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
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
            "creation_date"=>"required|date",
            "type_id"=>"required",
        ]);
        $newProject = new Project();
        $newProject->creation_date=date("y.m.d.");
        $newProject->is_completed=false;
        $newProject->fill($data);
        ddd($data);
        
        $newProject->save();
        return redirect()->route('project.show', ['project' => $newProject]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            'project' => $project,
        ];
        return view('project.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $data = [
            'project' => $project,
        ];
        return view('project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name= $data['name'];
        $project->description= $data['description'];
        $project->creation_date= $data['creation_date'];

        $project->save();

        return redirect()->route('project.show', ['project'=> $project] );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {   
        $project->delete();
        return redirect()->route('project.index');
    }
}
