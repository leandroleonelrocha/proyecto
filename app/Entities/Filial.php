<?php
namespace App\Entities;

class Filial extends Entity {

    protected  $table= 'filial';
	protected  $primaryKey='id_filial';
    
    protected $fillable   = ['nombre', 'direccion', 'localidad', 'id_director', 'mail', 'created_at','updated_at'];


}