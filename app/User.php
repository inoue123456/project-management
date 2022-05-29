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
    protected $fillable = [
        'name', 'email', 'password', 'department_name', 'role'
    ];

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
        'password' => 'required', 
        'department_name' => 'required', 
        'role'=> 'required');
    
    public function projects() {
        return $this->hasMany('App\Project');
    }
    
    public function departments() {
        return $this->belongsTo('App\Department');
    }
    
    public function isAdmin(){
        return $this->role == 1;
    }
}
