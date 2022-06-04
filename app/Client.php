<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['client_company_id', 'client_name', 'e-mail', 'phone_number'];
    
    public static $client_rules = array(
        'client_name' => 'required',
        'e-mail' => 'required',
        'phone_number' => 'required');
        
    public function client_company() {
        return $this->belongsTo('App\Clientcompany');
    }
}
