<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Client;
use App\User;
use Auth;

class TaskController extends Controller
{
    public function add() {
        $projects = Auth::user()->projects()->get();
        return view('task.new', compact('projects'));
    }
    
    public function create(Request $request) {
        $this->validate($request, Task::$rules);
        
        $task = new Task;
        $form = $request->all();
        
        function hasSelectedProject($form) {
            return $form["project_id"] !== '---';
        }
        
        if(!hasSelectedProject($form)) {
            \Session::flash('err_msg', 'プロジェクトを選択してください。');
        } else {
            $task->fill($form);
            $task->save();
        }
        return redirect()->back();
    }
    
    public function edit(Task $task) {
        $projects = Project::all();
        return view('task.edit', compact('task', 'projects'));
    }
    
    public function update(Request $request, Task $task) {
        $this->validate($request, Task::$rules);
        $task->fill($request->all())->update();
        return redirect()->back();
    }
    
    public function delete(Request $request, Task $task) {
        $task->delete();
        return redirect()->back();
    }
    
    public function showProgress(Project $project) {
        $tasks = Task::where('project_id', $project->id)->get();
        //$client = Client::where('id', $project->client_id)->first();
        //return view('task.show_progress', compact('project','client','tasks'));
        return view('task.gantt', compact('tasks'));
    }
}
