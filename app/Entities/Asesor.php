<?php

namespace App\Entities;

class Asesor extends Entity
{
    protected $table = 'asesor';
    protected $primarykey   = 'id_asesor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_asesor','id_tipo_documento','nro_documento','apellidos','nombres','direccion','localidad','activo'];

    public function getFullNameAttribute()
    {
        return  $this->apellidos . ', ' . $this->nombres ;
    }

    // Relaciones
    public function Preinforme(){
        return $this->hasMany(Preinforme::getClass());
    }

    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::getClass());
    }
}
