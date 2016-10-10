<?php
namespace App\Entities;

class Materia extends Entity {

    protected  $table= 'materia';
  //  protected $primaryKey= 'id_materia';

    protected $fillable   = ['id', 'carrera_id', 'nombre','descripcion'];

}