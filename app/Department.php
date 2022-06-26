<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_name', 'user_name'];
    
    public static $rules = array(
        'department_name' => 'required',
        'user_name' => 'required'
        );
        
    public function users() {
        return $this->hasMany('App\User');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
