<?php

namespace App\Http\Repositories;
use App\Entities\Filial;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class FilialRepo extends BaseRepo {

    public function getModel()
    {
        return new Filial();
    }




}