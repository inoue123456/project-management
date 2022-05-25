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
    
    public static $rules = array(
        'name' => 'required',
        'contract_date' => 'required',
        'deadline_date' => 'required|after:contract_date',
        'company_name' => 'required',
        'client_name' => 'required',
        'e-mail' => 'required',
        'phone_number' => 'required'
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
}
