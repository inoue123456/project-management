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
        $department->fill($request->only(['department_name']));
        //部長名からユーザー名が一致するuser_idを取得
        $user_name = $request->user_name;
        //dd($user_name);
        $user = User::where('name', $user_name)->first();
        //dd($user);
        $department->user_id = $user->id;
        $department->save();
        return redirect()->back();
    }
    
    public function index()
    {
        $departments = Department::all();
        //dd($departments);
        /*foreach($departments as $department) {
            $leader = User::where('id', $department->user_id)->first();
            $leader_array = array($leader->name);
            //$leaders = array_merge($leader);
        dd($leader_array);
        }
        //*/
        return view('department.index', ['departments'=> Department::all() ]);
    }
    
    /*public function index()
    {
        $members = DB::select('select * from members');
        $data = ['departments' => $departments, 'members' => $members];
        return view('members.index', $data);
    }
    //*/
    
}
