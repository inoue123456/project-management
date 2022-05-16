<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon;
use Auth;

class ProjectController extends Controller
{
    public function add() {
        return view('project.new');
    }
    public function create(Request $request)
    {
        $this->validate($request, Project::$rules);
        
        $project = new Project;
        $form = $request->all();
        $project->fill($form);
        $project->user_id = Auth::id();
        $project->save();
        return redirect()->back();
    }
    
   public function index()
    {
        return view('project.index', ['projects'=> Project::all()]);
    }
    
    public function edit(Request $request)
    {
        $project = Project::find($request->id);
      if (empty($project)) {
        abort(404);    
      }
        return view('project.edit', ['project'=> $project]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Project::$rules);
      
        $project = Project::find($request->id);
        $project_form = $request->all();
        $project->fill($project_form)->save();

        return view('project.index', ['projects'=> Project::all()]);
       
    }
    
    public function delete(Request $request)
    {
        $project = Project::find($request->id);
        $project->delete();
        return redirect()->back();
    }
    
    
}
