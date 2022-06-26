<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['notification'];
    
    public static $rules = array(
        'notification' => 'required',
        );
    
       
    public function isAdmin(){
        return $this->role == 10;
    }
}
