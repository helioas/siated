<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{    
    protected $fillable = ['fact_description'];

    public $timestamps = false;
    
    public function subfact()
    {
        return $this->hasMany('App\Models\Subfact');
    }    
}