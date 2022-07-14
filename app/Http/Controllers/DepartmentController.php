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
    
    public function edit(Request $request, Department $department)
    {
        if (empty($department)) {
        abort(404);
        }
        return view('department.edit', compact('department'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Department::$project_rules);
      
        $department->fill($request->all());
        $department->update();
        return redirect()->back();
    }
    
    public function delete(Request $request, Department $department)
    {
        $department->delete();
        return redirect()->back();
    }
    
}
