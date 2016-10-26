<?php
namespace App\Entities;

class ClaseMatricula extends Entity {

    protected  $table= 'clase_matricula';
   // protected $primaryKey= 'id_curso';

    protected $fillable   = ['asistio','matricula_id','clase_id'];

    public function Clase()
    {
    	return $this->belongsTo(Clase::getClass());
    }

	
}