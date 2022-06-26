<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Task;

class TaskController extends Controller
{
    public function add() {
        return view('task.new', ['projects'=>Project::all()]);
    }
    
    
    public function create(Request $request) {
        $this->validate($request, Task::$rules);
        
        $task = new Task;
        $form = $request->all();
        $task->fill($form);
        
        function hasSelectedProject($form) {
            return $form["project_id"] !== '---';
        }
        if(!hasSelectedProject($form)){
            \Session::flash('err_msg', 'プロジェクトを選択してください。');
        } else {
            $task->save();
        }
        return redirect()->back();
    }
    
    public function showProgress(Project $project) {
        //dd($project);
        
        $tasks = Task::where('project_id', $project->id)->get();
        
        return view('task.show_progress', compact('tasks'));
    }
    
}
