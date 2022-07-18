<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function add() {
        $departments = Department::all();
        return view('user.admin.new', compact('departments'));
    }
    
    public function create(Request $request) {
        $this->validate($request, User::$rules);
        
        $user = new User;
        
        $form = $request->all();
        $user->fill($form);
        $pass = config('app.pass_key');
        $user->password = Hash::make($pass);
        
        
        function hasSelectedRole($form){
           return $form['role'] !== '---';
        }
        
        function hasSelectedDepartment($form){
           return $form['department_id'] !== '---';
        }
        
        if(hasSelectedRole($form) && hasSelectedDepartment($form)) {
            if($form['role'] === '一般社員') {
                $user->role = 0;
            } elseif($form['role'] === '部長') {
                $user->role = 5;
            } elseif($form['role'] === 'admin') {
                $user->role = 10;
            }
                $user->save();
            } else {
                if(!hasSelectedRole($form)) {
                    \Session::flash('err_msg_role', '権限を選択してください。');
                }
                if(!hasSelectedDepartment($form)) {
                    \Session::flash('err_msg_department', '所属を選択してください。');
                }
            }
        return redirect()->back();
    }
    
    
    
    public function index(Request $request) {
        $search_name = $request->search_name;
        if ($search_name) {
            $users = User::where('name', $search_name)->get();
        } else {
              $users = User::all();
        }
        return view('user.admin.index', compact('users', 'search_name'));
    }
    
    public function showDetail(User $user) {
        return view('user.admin.detail', compact('user'));
    }
    
    public function edit(User $user) {
        $departments=Department::all();
        return view('user.admin.edit', compact('user', 'departments'));
    }
    
    public function update(Request $request, User $user) {
        $this->validate($request,User::$update_rules);
        $form = $request->all();
        $user->fill($form);
        
        function hasSelectedRole($form){
           return $form['role'] !== '---';
        }
        
        function hasSelectedDepartment($form){
           return $form['department_id'] !== '---';
        }
        
        if(hasSelectedRole($form) && hasSelectedDepartment($form)) {
            if($form['role'] === '一般社員') {
                $user->role = 0;
            } elseif($form['role'] === '部長') {
                $user->role = 5;
            } elseif($form['role'] === 'admin') {
                $user->role = 10;
            }
            $user->update();
            session()->flash('updated_done','更新が完了しました');
            } else {
                if(!hasSelectedRole($form)) {
                    \Session::flash('err_msg_role', '権限を選択してください。');
                }
                if(!hasSelectedDepartment($form)) {
                    \Session::flash('err_msg_department', '所属を選択してください。');
                }
            }
        return redirect()->back(); 
    }
    
    public function delete(Request $request, User $user) {
        $user->delete();
        return redirect()->back();
    }
}
