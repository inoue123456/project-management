<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\PersonalTask;

class UserController extends Controller
{
    public function passwordChange(User $user)
    {
        $check_user = Auth::user();
           return view('user.password_change')->with('user', $user);
    }
    
    public function setting(Request $request, User $user)
    {
        $this->validate($request, User::$password_change_rules);
        $request->user()->fill(['password' => Hash::make($request->password)])->save();
        return redirect()->back();
    }
    
    public function home() {
        $projects = Auth::user()->projects()->orderBy('name')->get();
        $personal_tasks = Auth::user()->personal_tasks()->orderBy('personaltask_name')->get();
        return view('user.home', compact('projects', 'personal_tasks'));
    }
}
