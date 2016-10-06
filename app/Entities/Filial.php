<?php
namespace App\Entities;

class Filial extends Entity {

    protected  $table= 'filial';

    protected $fillable   = ['nombre', 'direccion', 'localidad', 'id_director', 'mail', 'activo', 'created_at','updated_at'];


}