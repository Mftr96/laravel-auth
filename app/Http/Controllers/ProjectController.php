<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



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
        /*condizione che controlla se c'è già o meno una foto 
        nel database e nel caso la sovrascrive per evitare sovraccarico dati*/
        if ($request->has('cover_image')) {
            // save the image

            $image_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $image_path;
            //dd($image_path, $val_data);
        }
        //dd($val_data);

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
        
        if ($request->has('cover_image')) {
            // save the image
            $image_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $image_path;         
            
            if ($project->cover_image && !Str::startsWith($project->cover_image, 'http')) {
                // not null and not startingn with http
                Storage::delete($project->cover_image);
            }
        }
        $project->cover_image=$val_data['cover_image'];
        $project->update();

        return redirect()->route('project.show', ['project'=> $project] );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    { 
        
        if ($project->cover_image && !Str::startsWith($project->cover_image, 'http')) {
            // not null and not startingn with http
            Storage::delete($project->cover_image);
        }


        $project->delete();

        return to_route('projects.index')->with('message', 'Project Deleted');  
        
    }
}
