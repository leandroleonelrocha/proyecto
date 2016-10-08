<?php

namespace App\Entities;


class TipoDocumento extends Entity
{
    protected $table = 'tipo_documento';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_documento'];

    public function Docente()
    {
        return $this->belongsToMany(Docente::getClass());
    }
}
