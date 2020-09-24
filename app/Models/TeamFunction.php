<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TeamFunction extends Model
{
    public $timestamps = false;
    protected $fillable = ['description_function'];
    
    public function serviceTeam()
    {
        return $this->hasMany('App\Models\ServiceTeam');        
    }      
}
