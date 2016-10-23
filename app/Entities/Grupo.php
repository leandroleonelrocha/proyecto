<?php
namespace App\Entities;

class Grupo extends Entity {

    protected  $table = 'grupo';
   // protected $primaryKey= 'id_curso';

    protected $fillable = ['curso_id','carrera_id','materia_id','descripcion','docente_id','turno_manana','turno_tarde','turno_noche','sabados','fecha_inicio','fecha_fin','filial_id','activo','terminado','cancelado'];

    //Relaciones
    public function Matricula(){
        return $this->belongsToMany(Matricula::getClass());
    }
}