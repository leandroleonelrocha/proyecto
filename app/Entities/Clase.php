<?php
namespace App\Entities;

class Clase extends Entity {

    protected  $table= 'clases';
   // protected $primaryKey= 'id_curso';

    protected $fillable   = ['id', 'grupo_id','fecha', 'descripcion','docente_id', 'dia', 'horario_desde', 'horario_hasta'];

	
}