<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MilitaryServer extends Model
{
    protected $connection = 'mypessoal';
    protected $table = 'servidor';  

    //protected $fillable = ['nome'];

    public function militaryOrganization()
    {
        //return $this->belongsTo('App\Models\MilitaryOrganization');
        return $this->belongsTo(MilitaryOrganization::class, 'id_opm', 'id');        
    } 

    public function locality()
    {
        //return $this->belongsTo('App\Models\Locality');
        return $this->belongsTo(Locality::class, 'id_local', 'id');        
    }   
    
    public function position()
    {   
        return $this->belongsTo(Position::class, 'id_cargo', 'id');        
    } 

    public function serviceTeam()
    {
        return $this->hasMany('App\Models\ServiceTeam');            
    }     
}
