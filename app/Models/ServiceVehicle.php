<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ServiceVehicle extends Model
{
    public $timestamps = false;
    protected $fillable = ['vehicle_id', 'vehicletype_id'];  
}
