<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public $timestamps = false;
    protected $fillable = ['type_description'];
}
