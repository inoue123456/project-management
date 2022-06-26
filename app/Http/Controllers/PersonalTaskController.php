<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\PersonalTask;
use Auth;

class PersonalTaskController extends Controller
{
    public function add() {
        return view('personaltask.new', ['tasks'=>Task::all()]);
    }
    
    public function create(Request $request) {
        $this->validate($request, PersonalTask::$rules);
        $personal_task = new PersonalTask;
        $form = $request->all();
        $personal_task->fill($form);
        if($form["task_id"] === '---'){
            \Session::flash('err_msg', 'タスクを選択してください。');
            return redirect()->back();
        }
        $personal_task->save();
        $user = Auth::id();
        
        $personal_task->users()->sync([$user]);
        
        return redirect()->back();
    }
    
    public function showProgress() {
        $personal_tasks = Auth::user()->personal_tasks()->orderBy('personaltask_name')->get();
        return view('personaltask.show_progress', compact('personal_tasks'));
    }
}
