<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ServiceTeam extends Model
{
    public $timestamps = false;
    protected $fillable = ['military_server_id', 'vehicle_id', 'vehicletype_id'];  


    public function militaryServer()
    {        
        return $this->belongsTo('App\Models\MilitaryServer');                        
    } 
    
    public function teamFunction()
    {        
        //return $this->belongsTo('App\Models\TeamFunction');                        
        return $this->belongsTo(TeamFunction::class, 'team_functions_id', 'id');        
    } 

    public function militaryOrganization()
    {
        return $this->belongsTo('App\Models\MilitaryOrganization');        
    }     
   
    public function locality()
    {
        return $this->belongsTo('App\Models\Locality');        
    }   
    

    public function getServiceStatusAttribute($value)
    {
        if ($value == 'S') {
            $this->attributes['service_status'] = 'Em Serviço';
        }
        else if ($value == 'F') {
            $this->attributes['service_status'] = 'Finalizado';
        }
        else {
            $this->attributes['service_status'] = 'Não Inf.';
        }

        return $this->attributes['service_status'];
    }    
}
