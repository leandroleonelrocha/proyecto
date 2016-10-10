<?php
namespace App\Entities;

class Director extends Entity {

    protected  $table= 'director';
 //	protected $primaryKey= 'id_director';

    protected $fillable   = ['tipo_documento_id', 'nro_documento', 'apellidos', 'nombres',];

     public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::getClass());
    }

}