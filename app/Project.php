<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //テーブル名
    protected $table = "projects";
    
    //可変項目
    protected $fillable = [
        'name',
        'contract_date',
        'deadline_date',
        ];
    
    public static $project_rules = array(
        'name' => 'required',
        'contract_date' => 'required',
        'deadline_date' => 'required|after:contract_date',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function users() {
        return $this->belongsToMany('App\User');
    }
    
    public function tasks() {
        return $this->hasMany('App\Task');
    }
    
    public function client() {
        return $this->belongsTo('App\Client');
    }
}
