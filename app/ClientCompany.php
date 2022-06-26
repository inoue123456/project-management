<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCompany extends Model
{
    protected $table = 'client_companies';
    protected $fillable = ['company_name'];
    
    public static $client_company_rule = array(
        'company_name' => 'required');
        
    public function clients() {
        return $this->hasMany('App\Client');
    }
}
