<?php
namespace App\Entities;

class GrupoMatricula extends Entity {

    protected  $table= 'grupo_matricula';
  //  protected $primaryKey= 'id_materia';

    protected $fillable   = ['grupo_id', 'matricula_1'];

    
}