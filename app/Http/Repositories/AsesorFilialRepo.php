<?php

namespace App\Http\Repositories;
use App\Entities\AsesorFilial;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class AsesorFilialRepo extends BaseRepo {

    public function getModel()
    {
        return new AsesorFilial();
    }
}