<?php

namespace App\Http\Repositories;
use App\Entities\PersonaTelefono;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class PersonaRepo extends BaseRepo {

    public function getModel()
    {
        return new PersonaTelefono();
    }
}