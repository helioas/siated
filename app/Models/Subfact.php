<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subfact extends Model
{
    protected $fillable = ['subfact_description', 'fact_id'];

    public $timestamps = false;

    public function fact()
    {
        return $this->belongsTo('App\Models\Fact');
    }  
}
