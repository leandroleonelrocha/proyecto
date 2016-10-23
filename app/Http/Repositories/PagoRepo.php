<?php

namespace App\Http\Repositories;
use App\Entities\Pago;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class PagoRepo extends BaseRepo {

    public function getModel()
    {
        return new Pago();
    }

}