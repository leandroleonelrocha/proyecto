<?php
namespace App\Entities;

class Grupo extends Entity {

    protected  $table= 'grupo';
   // protected $primaryKey= 'id_curso';

    protected $fillable   = ['curso_id', 'carrera_id', 'materia_id', 'descripcion', 'docente_id', 'turno_manana', 'turno_tarde', 'turno_noche', 'sabados', 'fecha_inicio', 'fecha_fin' , 'filial_id', 'activo', 'terminado', 'cancelado'];

	public function Curso(){
        return $this->belongsTo(Curso::getClass());
    }

	public function Carrera(){
        return $this->belongsTo(Carrera::getClass());
    }

	public function Materia(){
        return $this->belongsTo(Materia::getClass());
    }

 	public function Docente(){
        return $this->belongsTo(Docente::getClass());
    }
       
}