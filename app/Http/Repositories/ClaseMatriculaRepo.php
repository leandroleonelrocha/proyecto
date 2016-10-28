<?php

namespace App\Http\Repositories;
use App\Entities\ClaseMatricula;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class ClaseMatriculaRepo extends BaseRepo {

    public function getModel()
    {
        return new ClaseMatricula();
    }

    public function buscarClasePorMatricula($matricula, $clase)
    {
    	$qry = $this->model->where('matricula_id', $matricula)->where('clase_id',$clase)->first();
        if(count($qry) > 0)
        {   
            if($qry->asistio == 1)
                return '1';
            if($qry->asistio == 0)
                return '0';

        }else{

            return false;

        }
        /*if(count($qry) > 0)
        {
            return $qry->asistio;
        }
        if(count($qry) < 0 || empty($qry))
        {
            return FALSE;
        }*/

    }

}