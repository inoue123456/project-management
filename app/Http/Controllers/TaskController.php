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
        if($form["project_id"] === '---'){
            \Session::flash('err_msg', 'プロジェクトを選択してください。');
            return redirect()->back();
        }
        
        //dd($form, $task->toArray());
        $task->save();
        return redirect()->back();
    }
    
}
