<?php

namespace App\Http\Repositories;
use App\Entities\Persona;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class PersonaRepo extends BaseRepo {

    public function getModel()
    {
        return new Persona();
    }

    public function getPersonasFilial(){
    	$filial = session('usuario')['entidad_id'];
        return Persona::where('filial_id', $filial)->get();
    }
}