<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'task_name', 'progress', 'deadline_date'];
    
    protected $attributes = [
        'progress' => 0,
    ];
    
    public static $rules = array(
        'project_id' => 'required',
        'task_name' => 'required',
        'progress' => 'required',
        'deadline_date' => 'required',
        );
    
    public function project() {
        return $this->belongsTo('App\Project');
    }
    
    public function personaltask() {
        return $this->hasMany('App\PersonalTask');
    }
}
