<?php

namespace App\Http\Repositories;
use App\Entities\PersonaMail;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class PersonaMailRepo extends BaseRepo {

    public function getModel()
    {
        return new PersonaMail();
    }
}