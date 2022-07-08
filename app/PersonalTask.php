<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalTask extends Model
{
    protected $table = 'personal_tasks';
    protected $fillable = ['task_id', 'personaltask_name','progress', 'deadline_date'];
    
    public static $rules = array(
        'task_id' => 'required',
        'personaltask_name' => 'required',
        'deadline_date' => 'required');
        
    public function task() {
        return $this->belongsTo('App\Task');
    }
    
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
