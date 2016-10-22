<?php

namespace App\Http\Repositories;
use App\Entities\AsesorTelefono;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class AsesorTelefonoRepo extends BaseRepo {

    public function getModel()
    {
        return new AsesorTelefono();
    }
}