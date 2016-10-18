<?php

namespace App\Http\Repositories;
use App\Entities\Asesor;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class AsesorRepo extends BaseRepo {

    public function getModel()
    {
        return new Asesor();
    }

    public function allAsesorFilial(){
        $filial = session('usuario')['entidad_id'];
        return Asesor::where('activo', 1)->where('filial_id', $filial)->get();
    }
}