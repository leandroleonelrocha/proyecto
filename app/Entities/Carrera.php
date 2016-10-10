<?php
namespace App\Entities;

class Carrera extends Entity {

    protected  $table= 'carrera';
   // protected $primaryKey= 'id_carrera';

    protected $fillable   = ['id', 'nombre','duracion', 'descripcion'];

}