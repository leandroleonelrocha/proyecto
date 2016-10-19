<?php

namespace App\Http\Repositories;
use App\Entities\DirectorTelefono;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class DirectorTelefonoRepo extends BaseRepo {

    public function getModel()
    {
        return new DirectorTelefono();
    }
}