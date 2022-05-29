<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\PersonalTask;

class PersonalTaskController extends Controller
{
    public function add() {
        return view('personaltask.new', ['tasks'=>Task::all()]);
    }
    
    public function create(Request $request) {
        $this->validate($request, Personaltask::$rules);
        $personaltask = new Personaltask;
        $form = $request->all();
        $personaltask->fill($form);
        if($form["task_id"] === '---'){
            \Session::flash('err_msg', 'タスクを選択してください。');
            return redirect()->back();
        }
        $personaltask->save();
        return redirect()->back();
    }
}
