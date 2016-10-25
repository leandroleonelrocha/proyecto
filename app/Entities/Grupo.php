<?php
namespace App\Entities;

class Grupo extends Entity {

    protected  $table= 'grupo';
   // protected $primaryKey= 'id_curso';

  

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