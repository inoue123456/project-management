<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\PersonalTask;

class EmployeeController extends Controller
{
    public function passwordChange(User $user)
    {
        $check_user = Auth::user();
           return view('employee.password_change')->with('user', $user);
    }
    
    public function setting(Request $request, User $user)
    {
        $user = Auth::user();
        //dd($user);
        $new_password = $request->password;
        $old_password = $request->currentpassword;
        $new_password_confirm = $request->password_confirmation;
        //dd($new_password_confirm);
        /*$hash = $user->password;
        dd($hash);
        $hash = '$2y$10$gheWK87zN9nxZU4AtjH.te4/L72kHpzFQbyRDu5EK8.WFMMTRLc8q';
        
        if (Hash::check($old_password, $user->password)) {
            echo "一致";
        } else {
            echo "不一致";
        }
        /*$request->user()->fill([
            'password' => Hash::check($old_password)
        ])
        $request->user()->fill([
            'password' => Hash::make($new_password)
        ])->save();
        //*/
        if(!(Hash::check($old_password, $user->password))) {
           \Session::flash('err_msg_currentpassword', '現在のパスワードが間違っています。');
           return redirect()->back();
        } elseif($new_password == null) {
            //echo 'null';
            \Session::flash('err_msg_password_null', '新しいパスワードを入力してください。');
            return redirect()->back();
        } elseif(Hash::check($new_password, $user->password)) {
            \Session::flash('err_msg_newpassword', '新しいパスワードが、現在のパスワードと同じです。違うパスワードを設定してください。');
            return redirect()->back();
        } elseif($new_password == $request->password_confirmation) {
            $request->user()->fill([
            'password' => Hash::make($new_password)
            ])->save();
            \Session::flash('changed_done','パスワードが正しく変更されました');
            return redirect()->back();
            //return redirect()->back()->with(['user' => $user, 'say' => 'パスワードが正しく変更されました']);
        } else {
            \Session::flash('err_msg_not_confirmed', '新しいパスワードの確認には新しいパスワードと同じパスワードを入力してください。');
            return redirect()->back();
        }
    }
    
    public function home() {
        
        $projects = Auth::user()->projects()->orderBy('name')->get();
        
        $personal_tasks = Auth::user()->personal_tasks()->orderBy('personaltask_name')->get();
        
        return view('employee.home', compact('projects', 'personal_tasks'));
    }
}
