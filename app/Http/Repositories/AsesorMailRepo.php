<?php

namespace App\Http\Repositories;
use App\Entities\AsesorMail;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class AsesorMailRepo extends BaseRepo {

    public function getModel()
    {
        return new AsesorMail();
    }
}