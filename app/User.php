<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static $rules = array(
        'name' => 'required', 
        'email' => 'required', 
        'department_id' => 'required', 
        'role'=> 'required');
    
    public static $update_rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ];
    
    public static $password_change_rules = [
        'current_password' => ['required', 'password'],
        'password' => ['required', 'min:5', 'confirmed'],
        'password_confirmation' => ['required'],
    ];
    
    public function projects() {
        return $this->belongsToMany('App\Project');
    }
    
    public function personal_tasks() {
        return $this->belongsToMany('App\PersonalTask');
    }
    
    public function departments() {
        return $this->belongsTo('App\Department');
    }
    
    public function isAdmin(){
        return $this->role == 10;
    }
    
    public function isManager(){
        return $this->role >= 5;
    }
    
    /*public function isEmployee(){
        return $this->role == 0;
    }
    //*/
}
