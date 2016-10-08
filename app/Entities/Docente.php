<?php

namespace App\Entities;

class Docente extends Entity
{
    protected $table = 'docente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','tipo_documento_id','nro_documento','apellidos','nombres','descripcion','disponibilidad_manana','disponibilidad_tarde','disponibilidad_noche','activo'];

    // Relaciones
    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::getClass());
    }
}
