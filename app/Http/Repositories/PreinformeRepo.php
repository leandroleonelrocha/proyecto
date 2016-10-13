<?php

namespace App\Http\Repositories;
use App\Entities\Preinforme;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class PreinformeRepo extends BaseRepo {

    public function getModel()
    {
        return new Preinforme();
    }
}