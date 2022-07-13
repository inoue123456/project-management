<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;

class DepartmentController extends Controller
{
    public function add() {
        return view('department.new');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Department::$rules);
        $department = new Department;
        $user = User::where('name', $request->user_name)->first();
        $department->fill($request->only(['department_name']));
        $department->user_id = $user->id;
        $department->save();
        return redirect()->back();
    }
    
    public function index()
    {
        return view('department.index', ['departments'=> Department::all() ]);
    }
    
}
