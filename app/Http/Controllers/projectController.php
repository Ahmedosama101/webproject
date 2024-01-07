<?php
namespace App\Models;
namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\systemUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class projectController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all(); // select * from students
        return view('project.index',compact('projects'));
    }

    public function delete()
    {
        $projects = Project::all(); // select * from students
        return view('project.delete', compact('projects'));
    }
    public function toedit()
    {
        $projects = Project::all(); // select * from students
        return view('project.toedit', compact('projects'));
    }

    public function updatestatus()
    {
        $projects = Project::all(); // select * from students
        return view('project.updatestatus', compact('projects'));
    }
    
    public function status(Project $project)
    {
        return view('project.status', compact('project'));
    }
    
    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = systemUser::where('role', 'Developer')->get();
        return view('project.create', compact('developers'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = new Project;
        $project->name = $request->name;
        $project->owner = $request->owner;
        $project->type = $request->type;
        $project->startdate = $request->startdate;
        $project->enddate = $request->enddate;
        $project->estimatedduration = $request->estimatedduration;
        $project->initiation = $request->initiation;
        $project->planning = $request->planning;
        $project->leaddeveloper = $request->leaddeveloper;  
        $project->design = $request->design;
        $project->test = $request->test;
        $project->deploy = $request->deploy;
        $project->status = $request->status;
        $project->save();
        $project->developers()->attach($request->input('developers'));

        return redirect()->route('project.index')->withSuccess('New student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('project.index')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('project.index');
    }
    /*
    public function deleteProjects()
    {
        $projects = Project::all();
        return view('delete-projects',  ['x'=>$projects]);
    }
    public function destroyProject($project)
    {
        $projects=Project::find($project);
        $projects->delete();
        return redirect('delete');
    }*/
}
