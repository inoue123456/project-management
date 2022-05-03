<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add() {
        return view('manager.task.create');
    }
    public function create() {
        return redirect('manager/task/create');
    }
    public function edit() {
        return view('manager.task.edit');
    }
    public function update() {
        return redirect('manager/task/edit');
    }
}
