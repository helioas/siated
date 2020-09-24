<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $connection = 'myveiculo';
    
    protected $table = '_14_03_viatura';  

    protected $primaryKey = 'idviatura';
}
