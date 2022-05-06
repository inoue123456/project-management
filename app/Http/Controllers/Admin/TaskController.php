<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function add() {
        return view('task.new');
    }
    public function create() {
        return redirect('task/new');
    }
    
}
