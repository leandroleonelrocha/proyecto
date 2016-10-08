<?php
namespace App\Entities;

class Director extends Entity {

    protected  $table= 'director';
 	protected $primaryKey= 'id_director';

    protected $fillable   = ['id_tipo_documento', 'nro_documento', 'apellido', 'nombre',];


}