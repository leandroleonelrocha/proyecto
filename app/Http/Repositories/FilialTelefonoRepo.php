<?php

namespace App\Http\Repositories;
use App\Entities\FilialTelefono;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class FilialTelefonoRepo extends BaseRepo {

    public function getModel()
    {
        return new FilialTelefono();
    }
}