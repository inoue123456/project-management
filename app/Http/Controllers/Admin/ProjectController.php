<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function add() {
        return view('project.new');
    }
    public function create(Request $request)
    {
        $project = new Project;
        $project->fill($request->all());
        $project->save();
        return redirect()->back();
    }
    
    
    
    
}
