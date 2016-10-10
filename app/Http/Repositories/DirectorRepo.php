<?php

namespace App\Http\Repositories;
use App\Entities\Director;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class DirectorRepo extends BaseRepo {

    public function getModel()
    {
        return new Director();
    }

       public function disable($director){
    	$director->activo = 0;
    	return $director->save();
    }
}