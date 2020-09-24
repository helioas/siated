<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormAttendance extends Model
{
    protected $fillable = ['description_form_attendance'];

    public $timestamps = false;

    /*public function getDescricaoAttribute()
    {
        return strtoupper($this->attributes['descricao'] );
    } */

   /* public function setDescricaoAttribute()
    {
        $this->attributes['descricao'] = strtoupper($this->attributes['descricao'] );
    }*/
}
