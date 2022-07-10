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
    public function passwordChange() {
        return view('user.password_change');
    }
    
    public function setting(Request $request, User $user) {
        $this->validate($request, User::$password_change_rules);
        $request->user()->fill(['password' => Hash::make($request->password)])->save();
        return redirect()->back();
    }
    
    public function home() {
        $projects = Auth::user()->projects()->orderBy('name')->get();
        return view('user.home', compact('projects'));
    }
}
