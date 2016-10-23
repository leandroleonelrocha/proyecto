<?php
namespace App\Entities;

class Calendar extends Entity {

    protected  $table= 'calendar';
   // protected $primaryKey= 'id_curso';

    protected $fillable   = ['id', 'title','startdate', 'enddate','allDay'];

	
}