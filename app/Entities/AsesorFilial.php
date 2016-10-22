<?php

namespace App\Entities;

class AsesorFilial extends Entity
{
    protected $table = 'asesor_filial';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['asesor_id','filial_id'];

    // Relaciones
    public function AsesorF(){
        return $this->belongsTo(AsesorF::getClass());
    }
}