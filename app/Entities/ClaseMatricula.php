<?php
namespace App\Entities;

class ClaseMatricula extends Entity {

    protected  $table= 'clase_matricula';
   // protected $primaryKey= 'id_curso';

    protected $fillable   = ['grupo_id','fecha', 'matricula_id','asistion'];

	
}