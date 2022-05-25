<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function add() {
        return view('user.new');
    }
    
    public function create(Request $request) {
        $this->validate($request, User::$rules);
        $user = new User;
        $form = $request->all();
        $user->fill($form);
        $user->save();
        return redirect()->back();
    }
    
    public function index() {
        return view('user.index', ['users'=>User::all()]);
    }
    
    public function edit(User $user) {
        return view('user.edit',compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $this->validate($request,User::$update_rules);
        $user->fill($request->only(['name','email']))->update();
        session()->flash('updated_done','更新が完了しました');
        return redirect()->back();
    }
}
