<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $connection = 'mypessoal';
    protected $table = 'cargo';  
    
    public function militaryServer()
    {
        return $this->hasMany('App\Models\MilitaryServer');        
    }  
}
