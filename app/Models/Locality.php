<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $connection = 'mypessoal';
    protected $table = 'localidade';  

    public function militaryOrganization()
    {
        return $this->belongsTo('App\Models\MilitaryOrganization');
    }   
    
    public function militaryServer()
    {
        return $this->hasMany('App\Models\MilitaryServer');
    }   
    
    public function serviceTeam()
    {
        return $this->hasMany('App\Models\ServiceTeam');
    }       
}
