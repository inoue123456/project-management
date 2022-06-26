<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function add() {
        return view('notification.new');
    }
    
    public function create(Request $request) {
        $this->validate($request, Notification::$rules);
        $notification = new Notification;
        $notification->fill($request->all());
        $notification->save();
        return redirect()->back();
    }
}
