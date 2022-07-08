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
        $personal_task->fill($request->all());
        if($form["task_id"] === '---'){
            \Session::flash('err_msg', 'タスクを選択してください。');
        } else {
            $personal_task->save();
        }
        
        $user = Auth::id();
        
        $personal_task->users()->sync([$user]);
        
        return redirect()->back();
    }
    
    public function edit(PersonalTask $personal_task) {
        return view('personaltask.edit', ['personal_task' => $personal_task, 'tasks'=>Task::all()]);
    }
    
    public function update(Request $request, PersonalTask $personal_task)
    {
        $this->validate($request, PersonalTask::$rules);
        $personal_task->fill($request->all())->save();
        return redirect()->back();
    }
    
    public function showDetail(PersonalTask $personal_task)
    {
        return view('personaltask.detail', compact('personal_task'));
    }
    
    public function showProgress() {
        $personal_tasks = Auth::user()->personal_tasks()->orderBy('personaltask_name')->get();
        return view('personaltask.show_progress', compact('personal_tasks'));
    }
}
