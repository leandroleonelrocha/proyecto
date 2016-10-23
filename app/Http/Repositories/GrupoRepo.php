<?php

namespace App\Http\Repositories;
use App\Entities\Grupo;
use App\Http\Repositories\BaseRepo;

class GrupoRepo extends BaseRepo {

    public function getModel()
    {
        return new Grupo();
    }

    public function allEneable(){
       
       $filial = session('usuario')['entidad_id'];
       return $this->model->where('activo',1)->where('filial_id', $filial)->get();

    }

}