<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientcompany extends Model
{
    protected $table = 'client_companies';
    protected $fillable = ['company_name'];
    
    public static $rules = array(
        'company_name' => 'required');
        
    public function client() {
        return $this->hasMany('App\Client');
    }
}
