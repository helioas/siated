<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilitaryOrganization extends Model
{
    protected $connection = 'mypessoal';
    protected $table = 'opm';  

    public function locality()
    {
        return $this->hasMany('App\Models\Locality');
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
