<?php

namespace App\Entities;

class Matricula extends Entity
{
    protected $table = 'matricula';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['persona_id','curso_id','carrera_id','filial_id','asesor_id','activo','terminado','cancelado'];

    // Relaciones
    public function Persona(){
        return $this->belongsTo(Persona::getClass());
    }

    public function Asesor(){
        return $this->belongsTo(Asesor::getClass());
    }

    public function Pago(){
        return $this->belongsTo(Pago::getClass());
    }

    public function Grupo(){
        return $this->belongsToMany(Grupo::getClass());
    }
}
