<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function add() {
        return view('manager.project.create');
    }
    public function create() {
        return redirect('manager/project/create');
    }
    public function edit() {
        return view('manager.project.edit');
    }
    public function update() {
        return redirect('manager/project/edit');
    }
    
    
    
}
