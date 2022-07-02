<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_company_id', 'client_name', 'email', 'phone_number'];
    
    public static $client_rules = array(
        'client_name' => 'required',
        'email' => 'required',
        'phone_number' => 'required');
        
    public function client_company() {
        return $this->belongsTo('App\Clientcompany');
    }
}
