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

}